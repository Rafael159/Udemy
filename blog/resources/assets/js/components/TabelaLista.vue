<template>
    <div>        
		
		<div class="form-inline">
       		<a v-if="criar" v-bind:href="criar">Criar</a>
			<!--campo de busca-->
			<div class="form-group pull-right">
				<input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
			</div>
		</div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo, index) in titulos">{{titulo}}</th>
                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item">{{i}}</td>
                    
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
                            <a v-if="editar" v-bind:href="editar"> Editar |</a>                           
                            <a href="#" v-on:click="executaForm(index)">Deletar</a>
                        </form>
						<span v-if="!token">
							<a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
							<a v-if="editar" v-bind:href="editar"> Editar |</a>
							<a v-if="deletar" v-bind:href="deletar">Deletar</a>
						</span>
						<span v-if="token && !deletar">
							<a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a>
							<a v-if="editar" v-bind:href="editar"> Editar</a>
						</span>
                    </td>
                </tr>                
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
	   props:['titulos', 'itens','ordem', 'ordemcol', 'criar', 'detalhe', 'editar', 'deletar', 'token'],
	   data: function(){
		   return {
			   buscar: '',
			   ordemAux: this.ordem || "asc",
			   ordemAuxCol: this.ordemcol || 0
		   }
	   },
       methods:{
		   executaForm: function(index){
			   document.getElementById(index).submit();
		   },
		   ordenaColuna: function(coluna){
			   this.ordemAuxCol = coluna;
			   if(this.ordemAux.toLowerCase() == "asc"){
				   this.ordemAux = 'desc';
			   }else{
				   this.ordemAux = 'asc';
			   }
		   }
	   },
	   computed:{
		   lista: function(){
			   
				let ordem = this.ordemAux;//se existir, pega o primeiro valor, senão pela o valor padrão
				let ordemCol = this.ordemAuxCol;

				ordem = ordem.toLowerCase();//garantir que valor seja minúsculo
				ordemCol = parseInt(ordemCol);//garantir que valor seja inteiro
				 
				if(ordem == "asc"){
					//ordenar de forma crescente
					this.itens.sort(function(a, b){
						if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return 1; }
						if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return -1; }
						return 0;
					});
				}else{
					//ordenar de forma decrescente
					this.itens.sort(function(a, b){
						if(Object.values(a)[ordemCol] < Object.values(b)[ordemCol]) { return 1; }
						if(Object.values(a)[ordemCol] > Object.values(b)[ordemCol]) { return -1; }
						return 0;
					});
				}			 	
				if(this.buscar){					
					return this.itens.filter(res => {
						var resp = Object.values(res);
						for(let k = 0; k < resp.length; k++ ){							
							if((resp[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
								return true;
							}
						}
						return false;
					});
				}
			   return this.itens;
		   }
	   }
    }
</script>