<template>
    <div class="card">
        <div class="card-header">
            <h3>Edición</h3>
        </div>
  <div class="card-body">
    <form @submit.prevent="update">
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
    name:"editNote",
    data(){
        return {
            note:{
                title: "",
                content: ""
            }
        }
    },
    mounted(){
        this.showNote()
    },
    methods:{
        async showNote() {
            await this.axios.get(`/api/notes/${this.$route.params.id}`)
            .then(response => {
                const {title, content} = response.data;
                this.note.title = title;
                this.note.content = content;
            })
            .catch(e => {
                console.log(e);
            })
        },
         async update() {
            await this.axios.put(`/api/notes/${this.$route.params.id}`, this.note)
            .then(response => {
                this.$router.push({
                    name:"indexNotes"
                })
            })
            .catch(e => {
                console.log(e);
            })
        }
    }
}
</script>