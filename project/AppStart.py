import sys
from flask import Flask
from flask_restful import Api
from src.controller.ProfessorController import ProfessorController
from database import db
import pymysql

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+pymysql://root:@localhost/T_VALL'
db.init_app(app)
api = Api(app)

api.add_resource(ProfessorController, '/professor', '/professor/<int:id>')

if __name__ == '__main__':
    with app.app_context():
        db.create_all()
    app.run()