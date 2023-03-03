from . import views
from django.urls import path

app_name = 'registroApp'

urlpatterns = [
    path('listado/', views.listado, name='listado'),
]