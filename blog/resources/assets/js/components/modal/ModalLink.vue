<template>
    <span>
        <span v-if="item">
            <button v-on:click="preencheFormulario()" v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <button v-on:click="preencheFormulario()" v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <a href="#" v-on:click="preencheFormulario()" v-if="tipo == 'link'" data-toggle="modal" v-bind:class="css || '' " v-bind:data-target="'#'+nome">{{titulo}}</a>
        </span>
        <span v-if="!item">
            <button v-if="!tipo || (tipo != 'button' && tipo != 'link')" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <button v-if="tipo == 'button'" type="button" v-bind:class="css || 'btn btn-primary'" data-toggle="modal" v-bind:data-target="'#'+nome">{{titulo}}</button>
            <a href="#" v-if="tipo == 'link'" data-toggle="modal" v-bind:class="css || '' " v-bind:data-target="'#'+nome">{{titulo}}</a>
        </span>
        
    </span>
</template>

<script>
    export default {
        props:['tipo', 'nome', 'titulo', 'css', 'item'],
        methods:{
            preencheFormulario: function(){
                this.$store.commit('setItem', this.item)
            }
        }
    }
</script>