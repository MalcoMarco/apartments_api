import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.data('apartmentData', () => ({
    open: false,
    apartments:{data:[],links:[]},
    page:1,
    per_page:100,
    sort:null,
    filter:{
        level:null,
        apartment_id:null,
        price:null,
        total_amount:null,
        availability_id:[]
    },
    initApartments() {
        this.getApartments();
    },
    getApartments(){
        const queryParams = new URLSearchParams();
        queryParams.append('page',this.page);
        queryParams.append('per_page',this.per_page);           
        if (this.sort) {
            queryParams.append('sort',this.sort);            
        }
        for (const key in this.filter) {
            if (Object.prototype.hasOwnProperty.call(this.filter, key)) {
                const element = this.filter[key];
                if (element != null && element.length>0) {
                    queryParams.append(`filter[${key}]`,element);                   
                }
            }
        }
        axios.get(`/api/apartments?${queryParams.toString()}`)
        .then((res)=>{
            this.apartments = res.data
        })
    },
    orderBy(columName){
        this.sort = columName;
        this.getApartments();
    },
    resetColum(columName){
        this.filter[columName]=null
        this.getApartments()
    },
    search(){        
        this.page = 1
        this.getApartments()
    },
    changePage(item){
        console.log(item);
        
        if (item.url != null && !item.active) {
            const urlObj = new URL(item.url);
            const params = new URLSearchParams(urlObj.search);
            this.page = params.get('page');
            this.getApartments()
        }
    },

}))
Alpine.start();