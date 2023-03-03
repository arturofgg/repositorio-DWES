from . import views
from django.urls import path

app_name = 'incidencias'

urlpatterns = [
    path('',views.prueba,name="prueba"),
    path('listado/', views.listado, name='listado'),
    path('<int:estaciones_id>/nueva/', views.nueva, name='nueva'),
    path('exito/', views.exito, name='correcto'),
]