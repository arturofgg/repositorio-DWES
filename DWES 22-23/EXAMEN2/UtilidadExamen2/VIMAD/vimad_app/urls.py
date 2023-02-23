from django.urls import path
from . import views
from django.conf import settings
from django.conf.urls.static import static

app_name = 'vimad'
urlpatterns = [
    path('estudios', views.lista_estudios, name='lista_estudios'),
    path('estudio/<str:estudio_nombre>', views.detalle_estudio, name='detalle_estudio'),
    path('director/<str:director_nombre>/', views.detalle_director, name='detalle_director'),
    path('actor/<str:actor_nombre>/', views.detalle_actor, name='detalle_actor'),
    path('corto/<int:corto_id>', views.listado_corto, name='listado_corto'),
    
    #RUTAS DE QUESTION Y CHOICE
    #URLS MODIFICADAS PARA AHORRA CODIGO
    path('', views.IndexView.as_view(), name='index'),
    path('<int:pk>/', views.DetailView.as_view(), name='detail'),
    path('<int:pk>/results/', views.ResultsView.as_view(), name='results'),
    path('<int:question_id>/vote/', views.vote, name='vote'),
]







#path('corto/<str:corto_titulo>/', views.detalle_corto, name='detalle_corto'),

"""
ESTA URL ESTA ASOCIADA A LA VISTA lista_estudios (TUTO2)
    path('estudio/', views.lista_estudios, name='lista_estudios')
"""