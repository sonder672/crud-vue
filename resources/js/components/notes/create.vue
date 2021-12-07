<template>
    <div class="card">
        <div class="card-header">
            <h3>Creación</h3>
        </div>
  <div class="card-body">
    <form @submit.prevent="create">
        <div class="col-12 mb-2">
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" class="form-control" v-model="note.title">
            </div>
        </div>
        <div class="col-12 mb-2">
            <div class="form-floating">
                <textarea class="form-control" id="floatingTextarea2" v-model="note.content"></textarea>
                <label>Contenido</label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
  </div>
    </div>
</template>

<script>
export default {
    name:"createNote",
    data(){
        return {
            note:{
                title: "",
                content: ""
            }
        }
    },
    methods:{
        async create() {
            await this.axios.post('/api/notes', this.note)
            .then(response => {
                this.$router.push({name:"indexNotes"});
            })
            .catch(e => {
                console.log(e);
            })
        }
    }
}
</script>