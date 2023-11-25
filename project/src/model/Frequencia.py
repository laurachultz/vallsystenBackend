from database import db

class Frequencia(db.Model):
    __tableName__ = "Frequencia"
    
    id_aula = db.Column(db.Integer, db.ForeignKey('Aula.id_aula'), primary_key=True)
    id_aluno = db.Column(db.Integer, db.ForeignKey('Aluno.id_aluno'), primary_key=True)
    presenca = db.Column(db.Boolean)
