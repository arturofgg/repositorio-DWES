from django.contrib import admin

from . models import *

# Register your models here.

class EstacionesInLine(admin.StackedInline):
    model = Estaciones

class LineaAdmin(admin.ModelAdmin):
    inlines = [EstacionesInLine]
    fields = ['nombre','color','distancia']
    
class IndcidentAdmin(admin.ModelAdmin):
    list_display = ['nombre','fecha']
    list_filter = ['fecha']
    
    

admin.site.register(Linea, LineaAdmin)
admin.site.register(Estaciones)
admin.site.register(Incidencia, IndcidentAdmin)