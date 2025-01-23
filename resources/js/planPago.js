import axios from "axios";
import { options } from "toastr";

Alpine.data("planPago", () => ({
    id:null,
    nombre_proyecto:"SAIKO BUSINESS & CORPORATE CENTER",
    descripcion:"LOCAL COMERCIAL",
    metros_construccion:40,
    metros_solar:"",
    piso:"",
    modulo:"",
    parqueo:"",
    mantenimiento:"",
    fecha_entrega: new Date().toISOString().split('T')[0],

    valor_propiedad:"7000000",
    reserva:"2000",
    inicial:"",
    porcentaje_saldo:15,
    monto_cuota_mensual:"",
    porcentaje_monto:30,
    contra_entrega:"",
    numero_cuotas:20,

    lista_cuotas:[{
        numero:0,
        fecha:new Date().toISOString().split('T')[0],
        monto:"000.00",
    }],

    asesor:"",
    cliente:"",
    fecha_envio_plan_pago: new Date().toISOString().split('T')[0],
    
    initData(data){
        if (!data) {
            return;
        }
        this.asesor = data.asesor;
        this.cliente = data.cliente;
        this.contra_entrega = data.contra_entrega;
        this.descripcion = data.descripcion;
        this.fecha_entrega = data.fecha_entrega;
        this.fecha_envio_plan_pago = data.fecha_envio_plan_pago;
        this.id = data.id;
        this.inicial = data.inicial;
        this.lista_cuotas = JSON.parse(data.lista_cuotas);
        this.mantenimiento = data.mantenimiento;
        this.metros_construccion = data.metros_construccion;
        this.metros_solar   = data.metros_solar;
        this.modulo = data.modulo;
        this.monto_cuota_mensual = data.monto_cuota_mensual;
        this.nombre_proyecto = data.nombre_proyecto;
        this.numero_cuotas = data.numero_cuotas;
        this.parqueo = data.parqueo;
        this.piso = data.piso;
        this.porcentaje_monto = data.porcentaje_monto;
        this.porcentaje_saldo = data.porcentaje_saldo;
        this.reserva = data.reserva;
        this.valor_propiedad = data.valor_propiedad;
    },
    calcularcuotas(){
        const payload = {
            valor_propiedad:this.valor_propiedad,
            reserva:this.reserva,
            porcentaje_saldo:this.porcentaje_saldo,
            porcentaje_monto:this.porcentaje_monto,
            numero_cuotas:this.numero_cuotas,
            fecha_entrega:this.fecha_entrega,
        }

        axios.post(`/api/calcular-cuotas`,payload).then((res) => {
            console.log(res.data);
            this.inicial = res.data.inicial;
            this.monto_cuota_mensual = res.data.monto_cuota_mensual;
            this.contra_entrega = res.data.contra_entrega;
            this.lista_cuotas = res.data.lista_cuotas;
        });
    },

    formatFecha(fecha) {
        const opciones = { day: '2-digit', month: '2-digit', year: 'numeric' };
        return new Intl.DateTimeFormat('es-ES', opciones).format(new Date(fecha));
    },

    formatCurrency(value) {
        const opciones = { style: 'currency', currency: 'USD' };
        return new Intl.NumberFormat('en-US', opciones).format(value);
    },

    guardarPlanPago(){
        const payload = {
            nombre_proyecto:this.nombre_proyecto,
            descripcion:this.descripcion,
            metros_construccion:this.metros_construccion,
            metros_solar:this.metros_solar,
            piso:this.piso,
            modulo:this.modulo,
            parqueo:this.parqueo,
            mantenimiento:this.mantenimiento,
            fecha_entrega:this.fecha_entrega,
            valor_propiedad:this.valor_propiedad,
            reserva:this.reserva,
            inicial:this.inicial,
            porcentaje_saldo:this.porcentaje_saldo,
            monto_cuota_mensual:this.monto_cuota_mensual,
            porcentaje_monto:this.porcentaje_monto,
            contra_entrega:this.contra_entrega,
            numero_cuotas:this.numero_cuotas,
            lista_cuotas:JSON.stringify(this.lista_cuotas),
            asesor:this.asesor,
            cliente:this.cliente,
            fecha_envio_plan_pago:this.fecha_envio_plan_pago,
        }

        if (this.id) {
            this.actualizaPlan(payload);
        }else{
            this.crearPlan(payload);
        }
        
    },

    crearPlan(payload){
        axios.post(`/dashboard/plan-pago`,payload).then((res) => {
            toastr.success(res.data.message);
            this.redirectPage();
        }).catch((error) => {
            console.log(error.response.data.errors);
            if (error.status === 422) {
                let listErrors = '';
                for (const key in error.response.data.errors) {
                    listErrors += error.response.data.errors[key] + '<br>';
                }
                toastr.error(listErrors);
                
            } else {
                toastr.error(error.response.data.message);
            }
        });
    },

    actualizaPlan(payload){
        axios.put(`/dashboard/plan-pago/${this.id}`,payload).then((res) => {
            toastr.success(res.data.message);
            this.redirectPage();
        }).catch((error) => {
            console.log(error.response.data.errors);
            if (error.status === 422) {
                let listErrors = '';
                for (const key in error.response.data.errors) {
                    listErrors += error.response.data.errors[key] + '<br>';
                }
                toastr.error(listErrors);
                
            } else {
                toastr.error(error.response.data.message);
            }
        });
    },

    redirectPage(){
        setTimeout(() => {
            window.location.href = '/dashboard/plan-pago-list';
        }, 2000);
    },

    descargarPreview(){
        const planpago = {
            nombre_proyecto:this.nombre_proyecto,
            descripcion:this.descripcion,
            metros_construccion:this.metros_construccion,
            metros_solar:this.metros_solar,
            piso:this.piso,
            modulo:this.modulo,
            parqueo:this.parqueo,
            mantenimiento:this.mantenimiento,
            fecha_entrega:this.fecha_entrega,
            valor_propiedad:this.valor_propiedad,
            reserva:this.reserva,
            inicial:this.inicial,
            porcentaje_saldo:this.porcentaje_saldo,
            monto_cuota_mensual:this.monto_cuota_mensual,
            porcentaje_monto:this.porcentaje_monto,
            contra_entrega:this.contra_entrega,
            numero_cuotas:this.numero_cuotas,
            lista_cuotas:JSON.stringify(this.lista_cuotas),
            asesor:this.asesor,
            cliente:this.cliente,
            fecha_envio_plan_pago:this.fecha_envio_plan_pago,
        }

        axios.post(`/dashboard/plan-pago-preview`, { planpago }, { responseType: 'blob' })
        .then((res) => {
            const url = window.URL.createObjectURL(new Blob([res.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'plan_pago_preview.pdf');
            document.body.appendChild(link);
            link.click();
            window.URL.revokeObjectURL(url);
        })
        .catch((error) => {
            console.log(error.response.data.errors);
            toastr.error('Error al generar la vista previa del plan de pago.');
        });
    }
            
            



}))

Alpine.data("listPlanPagos", () => ({
    items: { data: [], links: [] },
    page: 1,
    per_page: 100,

    initData() {
        this.getData();
    },

    getData() {
        axios.get(`/dashboard/api/plan-pago-list?page=${this.page}&per_page=${this.per_page}`).then((res) => {
            this.items = res.data;
        });
    },
    formatFecha(fecha) {
        const opciones = { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' };
        return new Intl.DateTimeFormat('es-ES', opciones).format(new Date(fecha));
    },
    deleteItem(itemId){

    }
}))