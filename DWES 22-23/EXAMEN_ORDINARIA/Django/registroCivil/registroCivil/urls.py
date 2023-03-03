from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('registroApp/', include('registroApp.urls')),
    path('admin/', admin.site.urls),
]
