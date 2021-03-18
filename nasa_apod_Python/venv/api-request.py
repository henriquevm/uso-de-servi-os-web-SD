# Importando bibliotecas:
from datetime import date
import requests
import pymysql
import json

def buscar_dados():

    payload = {'start_date': '2010-01-01', 'end_date': '2012-01-01'}

    api_url = 'https://api.nasa.gov/planetary/apod?api_key=P6fTNSRF0wycwT2HIQOMArp0FTuEwOO8LUE02MTj'
    request = requests.get(api_url, params=payload)
    #print(request.content)

    if request.status_code == 200:

        dados = request.json()

        #obj = request.content

        # Abrimos uma conexão com o banco de dados:
        conexao = pymysql.connect(db='nasa_apod', user='root', passwd='root')

        # Cria um cursor:
        cursor = conexao.cursor()

        for var in dados:
            cr_apod = var['copyright'] if 'copyright' in var else None
            date_apod = var['date'] if 'date' in var else None
            explanation_apod = var['explanation'] if 'explanation' in var else None
            title_apod = var['title'] if 'title' in var else None
            url_apod = var['url'] if 'url' in var else None
            '''
            date_apod = var['date']
            explanation_apod = var['explanation']
            title_apod = var['title']
            url_apod = var['url']
            '''
            #print('copyright_apod ' + cr_apod)
            #print('date_apod ' + date_apod)
            #print('explanation_apod ' + explanation_apod)
            #print('title ' + title_apod)
            #print('url ' + url_apod)

            # Executa o comando:
            cursor.execute("INSERT INTO apod (copyright_apod, date_apod, explanation_apod, title_apod, url_apod) VALUES (%s, %s, %s, %s, %s)",
                           (cr_apod, date_apod, explanation_apod, title_apod, url_apod))

        # Efetua um commit no banco de dados.
        # Por padrão, não é efetuado commit automaticamente. Você deve commitar para salvar
        # suas alterações.
        conexao.commit()

        # Finaliza a conexão
        conexao.close()

if __name__ == '__main__':
    buscar_dados()

