from flask import request
from flask_restful import Resource
from src.model.Professor import Professor
from database import db

class ProfessorController(Resource):
    def get(self, id):
        professor = Professor.query.get(id)
        if professor:
            return {'id': professor.id_professor, 'nome': professor.nome, 'email': professor.email}
        return {'error': 'Professor not found'}, 404

    def post(self):
        new_professor = Professor(
            nome=request.json['nome'],
            email=request.json['email'],
            senha=request.json['senha']
        )
        db.session.add(new_professor)
        db.session.commit()
        return {'message': 'New professor created.'}, 201

    def put(self, id):
        professor = Professor.query.get(id)
        if professor:
            professor.nome = request.json.get('nome', professor.nome)
            professor.email = request.json.get('email', professor.email)
            professor.senha = request.json.get('senha', professor.senha)
            db.session.commit()
            return {'message': 'Professor updated.'}
        return {'error': 'Professor not found'}, 404

    def delete(self, id):
        professor = Professor.query.get(id)
        if professor:
            db.session.delete(professor)
            db.session.commit()
            return {'message': 'Professor deleted.'}
        return {'error': 'Professor not found'}, 404
