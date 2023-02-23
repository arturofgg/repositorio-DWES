from django.db import models
from django.utils import timezone
import datetime;

class Estudio(models.Model):
    nombre=models.CharField(max_length=50)
    fec_fundacion=models.DateField()

    def __str__(self):
        return self.nombre
    
class Director(models.Model):
    nombre=models.CharField(max_length=50)
    fec_nacimiento=models.DateField()
    nacionalidad=models.CharField(max_length=50)
    #produce=models.ManyToManyField(Corto)

    class Meta:
        ordering = ['nombre']

    def __str__(self):
        return self.nombre
    
class Actor(models.Model):
    nombre=models.CharField(max_length=50)
    fec_nacimiento=models.DateField()
    nacionalidad=models.CharField(max_length=50)
    #actua=models.ManyToManyField(Corto)


    class Meta:
        ordering = ['nombre']

    def __str__(self):
        return self.nombre   
    
class Corto(models.Model):
    titulo=models.CharField(max_length=50)
    #puntuacion=models.CharField(max_length=50)
    genero=models.CharField(max_length=50)
    duracion=models.CharField(max_length=3)
    fec_estreno=models.DateField()
    idioma=models.CharField(max_length=50)
    pais=models.CharField(max_length=50)
    sinopsis=models.TextField(max_length=50)
    #imagen=models.ImageField(upload_to='', null=True)
    #video=models.FileField(upload_to='',null=True)
    dirige=models.ManyToManyField(Director)
    actua=models.ManyToManyField(Actor)
    produce=models.ManyToManyField(Estudio)
    imagen = models.ImageField(upload_to='cortos/',null=True)

    class Meta:
        ordering = ['titulo']

    def __str__(self):
        return self.titulo

class Question(models.Model):
    question_text = models.CharField(max_length=200)
    pub_date = models.DateTimeField('date published')

    def __str__(self):
        return self.question_text
        #return self.pub_date >= timezone.now() - datetime.timedelta(days=1)

class Choice(models.Model):
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    choice_text = models.CharField(max_length=200)
    votes = models.IntegerField(default=0)

    def __str__(self):
        return self.choice_text   
    
"""
class Dirige(models.Model):
    nombre = models.ForeignKey(Director, on_delete=models.CASCADE)
    titulo = models.ForeignKey(Corto, on_delete=models.CASCADE)
    id = MultiFieldPK('nombre', 'titulo')

    def __str__(self):
        return self.id

class Actua(models.Model):
    nombre = models.ForeignKey(Actor, on_delete=models.CASCADE)
    titulo = models.ForeignKey(Corto, on_delete=models.CASCADE)
    id = MultiFieldPK('nombre', 'titulo')

    def __str__(self):
        return self.id
 """