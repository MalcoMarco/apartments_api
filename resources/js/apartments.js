import { Modal } from "flowbite";
const $targetEl = document.getElementById("modalEl");
let modal;
if ($targetEl) {
    // options with default values
    const options = {
        placement: "center",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40",
        closable: true,
    };

    // instance options object
    const instanceOptions = {
        id: "modalEl",
        override: true,
    };
    modal = new Modal($targetEl, options, instanceOptions);
}
Alpine.data("apartmentData", () => ({
    open: false,
    apartments: { data: [], links: [] },
    page: 1,
    per_page: 100,
    sort: null,
    filter: {
        level: null,
        apartment_id: null,
        price: null,
        total_amount: null,
        availability_id: [],
    },
    apartmentItem: {
        id: null,
        level: 1,
        apartment_id: "",
        price: "",
        total_amount: "",
        availability_id: null,
        comments: null,
        square_meters:""
    },
    modalTitle:"",
    isformCreate:false,
    initApartments() {
        this.getApartments();
    },
    getApartments() {
        const queryParams = new URLSearchParams();
        queryParams.append("page", this.page);
        queryParams.append("per_page", this.per_page);
        if (this.sort) {
            queryParams.append("sort", this.sort);
        }
        for (const key in this.filter) {
            if (Object.prototype.hasOwnProperty.call(this.filter, key)) {
                const element = this.filter[key];
                if (element != null && element.length > 0) {
                    queryParams.append(`filter[${key}]`, element);
                }
            }
        }
        axios.get(`/api/apartments?${queryParams.toString()}`).then((res) => {
            this.apartments = res.data;
        });
    },
    orderBy(columName) {
        this.sort = columName;
        this.getApartments();
    },
    resetColum(columName) {
        this.filter[columName] = null;
        this.getApartments();
    },
    search() {
        this.page = 1;
        this.getApartments();
    },
    changePage(item) {
        console.log(item);

        if (item.url != null && !item.active) {
            const urlObj = new URL(item.url);
            const params = new URLSearchParams(urlObj.search);
            this.page = params.get("page");
            this.getApartments();
        }
    },
    createForm() {
        this.modalTitle ="Crear Nuevo Apartment:";
        this.apartmentItem = {
            id: null,
            level: 1,
            apartment_id: "",
            price: "",
            total_amount: "",
            availability_id: null,
            comments: null,
            square_meters:""
        };
        this.isformCreate = true
        modal.show();
    },
    editForm(itemParams) {
        this.modalTitle ="Editar: "+itemParams.apartment_id;
        this.apartmentItem = { ...itemParams };
        this.isformCreate = false
        modal.show();
    },
    storeForm(){
        let request ={
            method: 'post',
            url: "/dashboard/apartments",
            data: {...this.apartmentItem }
          }
        if (!this.isformCreate) {//url for update
            request.method = 'put'
            request.url += `/${this.apartmentItem.apartment_id}`
        }
        axios(request)
        .then((res)=>{
            toastr.success(res.data.message);
            this.getApartments()
            modal.hide();
        }).catch((err)=>{
            toastr.warning(err.response.data.message,"Error",{timeOut: 8000});
        })
    },
    deleteApartment(apartment_id){
        Swal.fire({
            title: "Estas Seguro?",
            text: "Se eliminara el apartment: "+apartment_id,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, Eliminar!"
          }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/dashboard/apartments/${apartment_id}`)
                .then((res)=>{
                    toastr.success(res.data.message);
                    this.getApartments()
                }).catch((err)=>{
                    toastr.warning(err.response.data.message,"Error");
                })
            }
          });
    },
    closeForm(){
        modal.hide();
    },
}));
