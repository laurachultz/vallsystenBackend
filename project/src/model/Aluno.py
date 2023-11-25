from database import db

class Aluno(db.Model):
    __tablename__ = 'Aluno'

    id_aluno = db.Column(db.Integer, primary_key=True, autoincrement=True)
    nome = db.Column(db.String(50), nullable=False)
    email = db.Column(db.String(50), nullable=False, unique=True)
    senha = db.Column(db.String(50), nullable=False)
    