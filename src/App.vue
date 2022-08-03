<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div class="card text-bg-dark">
    <img src="@/assets/carro1.png" class="card-img" alt="...">
    <div class="card-img-overlay">
      <h5 class="card-title titulo"><img src="@/assets/titulo.png" class="img-fluid position-relative" alt="..."></h5>
      <h5 class="card-title caracteristicas"><img src="@/assets/caracteristicas.png"
          class="img-fluid position-relative" alt="..."></h5>


      <form @submit.prevent="GenerarEnvio">
        <div id="formu" class="p-4 shadow overflow-hidden sm:rounded-md"
          style="background: #f5f5f5; width: 25%; float: right; margin-top: -80vh;">
          <div class="px-4 sm:p-6">
            <h1 class="mb-2 h1 font-bold tracking-tight text-gray-900 dark:text-white">¡Cotiza la tuya!</h1>

            <div class="grid grid-cols-6 gap-6">


              <div class="col-span-6 ">
                <label for="modelo" class="block text-sm font-medium text-gray-700">Selecciona tu modelo</label>
                <select id="modelo" required v-model="modelo" name="modelo" autocomplete="country-name"
                  class="mt-1 block rounded-full w-full py-2 px-3 border border-gray-300 bg-white  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option value="Rexton_G4">Rexton G4</option>
                  <option value="Rexton_Prueba2">Rexton Prueba 2</option>
                  <option value="Rexton_Prueba3">Rexton Prueba 3</option>
                  <option value="Rexton_Prueba4">Rexton Prueba 4</option>
                  <option value="Rexton_Prueba5">Rexton Prueba 5</option>
                </select>
              </div>


              <div class="col-span-6">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" required v-model="nombre" name="nombre" id="nombre"
                  autocomplete="nombre"
                  class="rounded-full mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
              </div>

              <div class="col-span-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" required v-model="email" name="email" id="email"
                  autocomplete="email"
                  class="rounded-full mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
              </div>

              <div class="col-span-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Numero Celular</label>
                <input type="text" required v-model="numero" name="numero" id="numero"
                  autocomplete="email"
                  class="rounded-full mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 " />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="departamento" class="block text-sm font-medium text-gray-700">Departamento</label>
                <select id="departamento" v-model="departa" @change="onChange($event)" required name="departamento"
                  autocomplete="departamento"
                  class="rounded-full mt-1 block w-full py-2 px-3 border border-gray-300 bg-white  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option :value="Departamento.id" v-for="(Departamento, index) in Departamento">{{
                      Departamento.departamento
                  }}</option>

                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="ciudad" class="block text-sm font-medium text-gray-700">Ciudad</label>
                <select id="ciudad" required v-model="ciudad" name="ciudad" autocomplete="ciudad"
                  class="rounded-full mt-1 block w-full py-2 px-3 border border-gray-300 bg-white  shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option :value="Ciudad" v-for="(Ciudad, index) in Ciudad">{{ Ciudad }}</option>
                </select>
              </div>
              <div class="col-span-6">
                <div class="flex items-center mb-4">
                  <input id="default-checkbox" required type="checkbox" value=""
                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Acepto
                    la politica de <span class="text-primary">Tratamiento de datos personales</span></label>
                </div>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 sm:px-6">
            <button id="enviar" type="submit"
              class="rounded-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium  text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enviar
              datos</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <RouterView />
</template>

<script setup>

import { Popover, PopoverButton, PopoverPanel } from '@headlessui/vue'
import { MenuIcon, XIcon } from '@heroicons/vue/outline'
import { RouterLink, RouterView } from 'vue-router'
import axios from 'axios'
const navigation = [
  { name: 'Product', href: '#' },
  { name: 'Features', href: '#' },
  { name: 'Marketplace', href: '#' },
  { name: 'Company', href: '#' },
]

</script>
<script>

export default {
  data() {
    return {
      Departamento: [],
      Ciudad: [],
      //nombre: "",
      //modelo: "",
      //email: "",
      //numero: "",
      //departa: "",
      //ciudad: "",
    };
  },
  mounted() {
    axios
      .get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')
      .then((response) => {
        this.Departamento = Array(response.data[12], response.data[29], response.data[1])
        console.log(response.data[12].departamento)
      })

  },
  methods: {
    GenerarEnvio: function (e) {
      e.preventDefault();
      var enquiryform = this;
      axios.get("https://movitluis.000webhostapp.com/post.php?action=enviaremail&" + "modelo" + "=" + enquiryform.modelo + "&nombre" + "=" + enquiryform.nombre
        + "&email" + "=" + enquiryform.email + "&numero" + "=" + enquiryform.numero + "&departamento" + "=" + enquiryform.departa + "&ciudad" + "=" + enquiryform.ciudad).then(
          function (respo) {
            if (respo.data == true) {
              Swal.fire("¡Sus datos han sido enviados correctamente!", "", "success");
              enquiryform.modelo = '';
              enquiryform.nombre = '';
              enquiryform.email = '';
              enquiryform.numero = '';
              enquiryform.departa = '';
              enquiryform.ciudad = '';
            } else {
              Swal.fire("¡Lo sentimos, no se enviaron datos!", "", "error");
            }
          },
          (error) => {
            //todo mal :P
          }
        );
    },

    onChange(event) {
      if (event.target.value == 1) {
        axios
          .get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')
          .then((response) => {
            this.Ciudad = response.data[1].ciudades
            console.log(this.Ciudad)
          })
      } else if (event.target.value == 12) {
        axios
          .get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')
          .then((response) => {
            this.Ciudad = response.data[12].ciudades
            console.log(this.Ciudad)
          })
      } else {
        axios
          .get('https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json')
          .then((response) => {
            this.Ciudad = response.data[29].ciudades
            console.log(this.Ciudad)
          })
      }
      //Ciudades();
      //console.log(event.target.value)
    },
  }
}
</script>
<style scoped>
.form-label,
.card-title,
select {
  color: #121212;
}

.titulo {
  margin-left: 5em;
}

.caracteristicas {
  margin-top: 80vh;
  margin-left: 5em;
}

input {
  color: #121212;
}

#enviar {
  background: #121212;
}
@media (max-width: 1200px) {
  .caracteristicas {
  display: none;
}
  #formu{
    margin-top: 30vh !important;
    width: initial !important;
    float: none !important;
  }
.card-img-overlay{
    border: none;
    border-radius: initial;
}
.card-img, .card{
  border: none;
}
}


</style>
