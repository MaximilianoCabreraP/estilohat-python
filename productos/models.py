from django.db import models

class Producto(models.Model):
    nombre = models.CharField(max_length=150)
    descripcion = models.CharField(max_length=250)
    marca = models.CharField(max_length=250)
    tipo =  [("Herramienta", "Herramienta"),("Material", "Material"),("Accesorio", "Accesorio"),]
    estado = [("Nuevo","Nuevo"),("Gastado","Gastado"),("Renovar","Renovar"),("Respuesto","Respuesto"),("Roto","Roto"),("Entero","Entero"),("Medio","Medio"),("Vacio","Vacio"),]
    def __str__(self):
        return self.nombre
    class Meta:
        verbose_name = "producto"
        verbose_name_plural = "productos"

# class Obrero(models.Model):
#     dni = models.IntegerField(max_length=10, blank=False)
#     nombre = models.CharField(max_length=150, blank=False)
#     apellido = models.CharField(max_length=150, blank=False)
#     telefono = models.CharField(max_length=20)
#     def __str__(self):
#         return self.dni
