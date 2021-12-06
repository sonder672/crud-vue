<template>
    <div class="container">
        <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link to="/notes/create" class="btn btn-primary">Nuevo</router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Contenido</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="note in notes" :key="note.id">
                            <td>{{ note.title }}</td>
                            <td>{{ note.content }}</td>
                            <td>
                    <router-link :to="{name:'editNotes', params:{id:note.id}}" class="btn btn-primary">Editar</router-link>
                    <a type="button" @click="destroyNote(note.id)" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: "notes",
    data(){
        return {
            notes:[]
        } 
    },
    mounted(){
        this.showNotes();
    },
    methods:{
        async showNotes() {
            await this.axios.get('/api/notes')
            .then(response => {
                this.notes = response.data;
            })
            .catch(e => {
                this.notes = [];
            })
        },
        destroyNote(id){
            if (confirm("¿Desea eliminar esta nota?")) {
                this.axios.delete(`/api/notes/${id}`)
                .then(response => {
                    this.showNotes();
                    })
                .catch(e => {
                    console.log(e);
                })
            }
        }
    }
}
</script>