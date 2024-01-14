from faker import Faker

data= Faker('pt_BR')

import mysql.connector as bd

config={
    'user':'root',
    'password':'',
    'host': 'localhost',
    'database':'gerador_fake'
}

try:
    conexao = bd.connect(**config)
    if conexao.is_connected():
        sql=conexao.cursor()

        for i in range(0,100):
            nome_fake=data.name()
            endereco_fake=data.address()
            tel_fake=data.phone_number()

            dados={
                'nome':nome_fake,
                'endereco':endereco_fake,
                'telefone':tel_fake
            }

            query="insert into dados (nome,endereco,telefone) values (%s,%s,%s)"
            valores_noInject=(dados['nome'],dados['endereco'],dados['telefone'])

            sql.execute(query,valores_noInject)

            conexao.commit()
            print("Dados inserido :)")

except bd.Error as err:
    print(f"Erro:{err}")

finally:
    if sql in locals() and sql is not None:
        print("Objeto sql fechado")

    if conexao in locals() and conexao.is_connected():
        conexao.close()
        print("Conexão com bd fecahada")