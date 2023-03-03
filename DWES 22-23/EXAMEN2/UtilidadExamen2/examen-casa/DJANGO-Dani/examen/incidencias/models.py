from django.db import models

class Linea(models.Model):

    nombre = models.CharField(max_length=100)
    color = models.CharField(max_length=100)
    distancia = models.IntegerField(default=0)

    def __str__(self):
        return f"{self.nombre}"


class Estaciones(models.Model):

    nombre = models.CharField(max_length=100)
    linea = models.ForeignKey(Linea, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.nombre}"
      

class Incidencia(models.Model):

    nombre = models.CharField(max_length=100)
    fecha = models.DateTimeField()
    estacion = models.ForeignKey(Estaciones, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.nombre} "
    
