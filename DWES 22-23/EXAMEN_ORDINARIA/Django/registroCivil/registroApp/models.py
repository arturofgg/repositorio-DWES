from django.db import models

# Create your models here.
class Persona(models.Model):
    nombre = models.CharField(max_length=200, null=False)
    apellido1 = models.CharField(max_length=200)
    apellido2 = models.CharField(max_length=200)
    descripcion = models.CharField(max_length=200)

    def __str__(self):
        return f"{self.nombre}"

class Pareja(models.Model):
    Integrante1 = models.ForeignKey(Persona, on_delete=models.CASCADE, related_name="Integrante1")
    Integrante2 = models.ForeignKey(Persona, on_delete=models.CASCADE, related_name="Integrante2")
    fecha = models.DateField()
    lugar = models.TextField(max_length=200)

    def __str__(self):
        return f"{self.Integrante1.apellido1}, {self.Integrante2.apellido2} ({self.fecha})"
