from database import db

class Aluno_turma(db.Model):
    __tableName__ = "Aluno_Turma"
    
    id_aluno = db.Column(db.Integer, db.ForeignKey('Aluno.id_aluno'), primary_key=True)
    id_turma = db.Column(db.Integer, db.ForeignKey('Turma.id_turma'), primary_key=True)
    