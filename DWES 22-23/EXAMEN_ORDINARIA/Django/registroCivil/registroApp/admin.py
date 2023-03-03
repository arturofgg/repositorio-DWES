from django.contrib import admin
from .models import Persona,Pareja

class PersonaAdmin(admin.ModelAdmin):
    list_display = ['nombre','apellido1', 'apellido2','descripcion']

# Register your models here.
admin.site.register(Persona, PersonaAdmin)
admin.site.register(Pareja)
