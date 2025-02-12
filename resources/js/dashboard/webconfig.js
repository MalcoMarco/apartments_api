Alpine.data("webconfig", () => ({
    resetInputsfiles(){
        // funcion para resetear todos lon inputs type="file"
        let inputs = document.querySelectorAll('input[type="file"]');
        inputs.forEach(input => {
            input.value = '';
        });
    },
    upload(event){
        let file = event.target.files[0];
        console.log(file);
        const fileTypes = ['image/png', 'image/x-icon',"image/svg+xml"];
        const input_name = event.target.name;
        if (file.size > 1024 * 1024 * 2) {
            alert('El archivo no puede ser mayor a 2MB');
            return;            
        }
        if (!fileTypes.includes(file.type)) {
            alert('El archivo debe ser de tipo PNG');
            return;            
        }
        const formData = new FormData();
        formData.append('file', file);
        formData.append('name', input_name);
        axios.post('/dashboard/webconfig/upload', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            console.log(response.data);
            window.location.reload();
        }).catch(error => {
            alert('Ocurrió un error al subir la imagen');
            console.log(error);
        });
        
    }
}))