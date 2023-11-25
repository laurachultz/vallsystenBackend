from database import db

class Turma(db.Model):
    id_turma = db.Column(db.Integer, primary_key=True, autoincrement=True)
    id_disciplina = db.Column(db.Integer, db.ForeignKey('disciplina.id_disciplina'), nullable=False)
    id_professor = db.Column(db.Integer, db.ForeignKey('professor.id_professor'), nullable=False)
    