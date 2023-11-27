from flask import Flask, jsonify
from flask_restful import Resource, Api
from flask_swagger_ui import get_swaggerui_blueprint
from flask_mysqldb import MySQL
import json
import os
app = Flask(_name_)
# Configuração do MySQL
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'cadastro'
mysql = MySQL(app)

@app.route('/cadatro', methods=['POST'])
def create_cadastro():
    nome = request.json['nome']
    cpf = request.json['cpf']
    instituicao_ensino = request.json['instituicao_ensino']
    telefone = request.json['telefone']
    senha= request.json['senha']
    cep =request.json['cep']
    email = request.json['email']
    cur = mysql.connection.cursor()
    cur.execute("INSERT INTO cadastro (nome, email,cpf,instituicao_ensino,telefone,senha,cep) VALUES (%s,%s,%s,%s,%s,%s,%s)", (nome, email,cpf,instituicao_ensino,telefone,senha,cep))
    mysql.connection.commit()
    return jsonify({'status': 'Cadastro criado com sucesso!'})

@app.route('/cadastro/<int:id>', methods=['PUT'])
def update_cadastro(id):
   nome = request.json['nome']
   cpf = request.json['cpf']
   instituicao_ensino = request.json['instituicao_ensino']
   telefone = request.json['telefone']
   senha= request.json['senha']
   cep =request.json['cep']
   email = request.json['email']
   cur = mysql.connection.cursor()
   cur.execute("UPDATE cadastro SET nome=%s,email=%s,cpf=%s,instituicao_ensino=%s,telefone=%s,senha=%s,cep=%s WHERE id=%s",(nome, email,cpf,instituicao_ensino,telefone,senha,cep))
   mysql.connection.commit()
   return jsonify({'status': 'Cadastro atualizado com sucesso!'})

@app.route('/cadastro/<int:id>', methods=['DELETE'])
def delete_cadastro(id):
   cur = mysql.connection.cursor()
   cur.execute("DELETE FROM cadastro WHERE id=%s", (id,))
   mysql.connection.commit()

api = Api(app)
@app.route('/cadastro', methods=['GET'])

def get_cadastro():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM cadastro")
    rv = cur.fetchall()
    return jsonify(rv) 

@app.route('/login/<strig:nome>/<strig:password>', methods=['GET'])

def get_login(nome,password):
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM cadastro WHERE nome=%s and senha=%s",(nome,password))
    rv = cur.fetchall()
    return jsonify(rv) 

# Configure Swagger UI
SWAGGER_URL = '/swagger'
API_URL = 'http://127.0.0.1:5000/swagger.json'
swaggerui_blueprint = get_swaggerui_blueprint(
    SWAGGER_URL,
    API_URL,
    config={
        'app_name': "Sample API"
    }
)
app.register_blueprint(swaggerui_blueprint, url_prefix=SWAGGER_URL)

@app.route('/swagger.json')
def swagger():
    # Obter o diretório atual
    current_dir = os.getcwd()
    # Concatenar o diretório atual com o nome do arquivo
    swagger_file_path = os.path.join(current_dir, 'swagger.json')

    # Agora, swagger_file_path contém o caminho completo para o arquivo swagger.json
    print(swagger_file_path)

    with open(swagger_file_path, 'r') as f:
        return jsonify(json.load(f))

# Define a sample resource




if _name_ == '_main_':
 app.run(debug=True)
 