import requests
import base64
import json

# Configurações
url = "https://equipobras.com.br/wp-json/wc/v3/products"
auth_str = "luis@braspump.com.br:aaOc 5QPj ocIG ni5X XrF0 dqiw"
encoded_auth = base64.b64encode(auth_str.encode('ascii')).decode('ascii')
headers = {
    "Authorization": f"Basic {encoded_auth}",
    "Content-Type": "application/json"
}

# Mapeamento de caracteres corrompidos (UTF-8 double encoded)
replacements = {
    "Ã¡": "á", "Ã©": "é", "Ã­": "í", "Ã³": "ó", "Ãº": "ú",
    "Ã£": "ã", "Ãµ": "õ", "Ã¢": "â", "Ãª": "ê", "Ã´": "ô",
    "Ã§": "ç", "Ã ": "à", "Ã\x81": "Á", "Ã\x89": "É", "Ã\x8d": "Í",
    "Ã\x93": "Ó", "Ã\x9a": "Ú", "Ã\x83": "Ã", "Ã\x95": "Õ", "Ã\x87": "Ç"
}

def fix_text(text):
    if not text:
        return text
    for old, new in replacements.items():
        text = text.replace(old, new)
    return text

print("Iniciando varredura de produtos...")
response = requests.get(url, params={"per_page": 100}, headers=headers)
if response.status_code == 200:
    products = response.json()
    for p in products:
        new_name = fix_text(p.get('name', ''))
        new_desc = fix_text(p.get('description', ''))
        
        if new_name != p.get('name') or new_desc != p.get('description'):
            print(f"Corrigindo acentuação em: {new_name}")
            update_data = {
                "name": new_name,
                "description": new_desc
            }
            res = requests.put(f"{url}/{p['id']}", headers=headers, json=update_data)
            if res.status_code == 200:
                print("Sucesso!")
            else:
                print(f"Erro ao atualizar ID {p['id']}")
else:
    print(f"Erro ao acessar API: {response.status_code}")

print("Processo concluído!")
