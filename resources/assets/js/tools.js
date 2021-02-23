/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

const Tools = {

    MENSAJE: {
        INFO: 1,
        ADVERTENCIA: 2,
        EXITO: 3,
        ERROR: 4
    },

    /**
     * Mensaje de alerta desplegable
     *
     * @param String o Array contenido
     * @param Integer tipo Tipo de mensaje, usar Tools.MENSAJE.[tipo]
     * @param String titulo
     * @param Integer duracion Duración en segundos
     *
     * @return void
     */
    mensajeAlerta(contenido, tipo, titulo, duracion, icono) {
        /* Tipos de mensajes y atributos por defecto */
        let CATEGORIA_MENSAJE = {
            INFO: {
                color: 'info',
                icono: 'info',
                titulo: 'Informaci&oacute;n'
            },
            ADVERTENCIA: {
                color: 'warning',
                icono: 'warning',
                titulo: 'Advertencia'
            },
            EXITO: {
                color: 'success',
                icono: 'checkmark',
                titulo: '¡&Eacute;xito!'
            },
            ERROR: {
                color: 'negative',
                icono: 'remove',
                titulo: 'Error'
            }
        };

        console.log(window.jQuery);

        /* Mensaje por defecto */
        let mensaje = CATEGORIA_MENSAJE.INFO;
        //Verificando tipo de mensaje y contenido de mensaje
        tipo = tipo || 1;

        switch (tipo) {
            case 2:
                mensaje = CATEGORIA_MENSAJE.ADVERTENCIA;
                break;
            case 3:
                mensaje = CATEGORIA_MENSAJE.EXITO;
                break;
            case 4:
                mensaje = CATEGORIA_MENSAJE.ERROR;
                break;
        }
        //Titulo de mensaje
        mensaje.titulo = (titulo !== undefined) ? titulo : mensaje.titulo;
        mensaje.contenido = (contenido !== undefined) ? contenido : "-";
        mensaje.duracion = ((duracion !== undefined) ? duracion : 3) * 1000;
        mensaje.tipo = tipo;
        mensaje.icono = (icono !== undefined) ? icono: mensaje.icono;

        let id = Math.random().toString().replace('.', '');
        let msg = '<div class="msggeneral ui icon compact message autumn leaf ' + mensaje.color + '" id="msg_' + id + '">' +
            '<div class="content">' +
            '<div class="header">' + mensaje.titulo + '</div>';

        /* Generando contenido de mensaje, en caso de arreglo secuencial mayor a 1 se crea una lista*/
        if (typeof mensaje.contenido == 'string') {

            msg += '<p>' + mensaje.contenido + '</p></div></div>';

        } else {
            if (mensaje.contenido.length == 1) {
                msg += '<p>' + mensaje.contenido[0] + '</p></div></div>';
            } else {

                msg += '<ul>';
                for (var i = 0; i < mensaje.contenido.length; i++) {
                    msg += '<li>' + mensaje.contenido[i] + '</li>';
                }
                msg += '<ul></div></div>';
            }

        }

        $('#msgcontainer').append(msg);
        $('#msg_' + id).transition('fly left in');

        Tools.delay(() => {
            $('#msg_' + id).transition('fly left', {
                onComplete: () => {
                    //$('#msg_' + id).remove();
                }
            });

        }, mensaje.duracion);
    },

    delay(callback, ms) {
        let timer = setTimeout(callback, ms);
    },

    id() {
        return '_' + Math.random().toString(36).substr(2, 9);
    },

    formatearFecha(fecha) {
        var fecha = new Date(fecha);

        var mes = parseInt(fecha.getMonth()) + 1;
        mes = (mes < 10) ? '0' + mes : mes;

        var dia = fecha.getDate();
        dia = (dia < 10) ? '0' + dia : dia;

        var anio = fecha.getFullYear();

        return dia + "-" + mes + "-" + anio;
    },

    gsub(source, pattern, replacement) {
        if (source == null) return "";
        var match, result;
        if (pattern == null || replacement == null) {
            return source;
        }
        result = '';
        while (match = source.match(pattern)) {
            result += source.slice(0, match.index);
            result += typeof replacement === 'function' ? replacement(match[0]) : replacement;
            source = source.slice(match.index + match[0].length);
        }
        return result + source;
    },

    remplazarTilde(texto) {
        const pattern = 'áéíóúÁÉÍÓÚñÑ';
        const replacement = 'aeiouAEIOUnN';

        let splitted = texto.split('');

        for (let x in splitted) {

            let location = pattern.indexOf(splitted[x]);

            if (location !== -1) {
                splitted[x] = replacement.substr(location, 1);
            }
        }

        return splitted.join('');
    },

    ordenarAlfabeticamente(array, key) {
        return array.sort(function(a, b) {
            if (a[key] == null || a[key] == undefined){
                return 0;
            }
            if (b[key] == null || b[key] == undefined){
                return 0;
            }
            if (a[key].toLowerCase() > b[key].toLowerCase()) {
                return 1
            }
            if (a[key].toLowerCase() < b[key].toLowerCase()) {
                return -1
            }
            return 0;
        })
    },
    /**
     * función que devuelve una cadena donde el primer caracter es mayúscula y lo demas minúscula
     * @param  {string} val cadena con posibles espacios
     * @return {string}     cadena con mayúscaula primero y luego minúsculas
     */
    initcap (val) {
        return val.toLowerCase().replace(/(?:^| )[a-z]/g, function (m) {
          return m.toUpperCase();
       });
    },
    /**
     * Lleva el scroll hacia el id solicitado
     * @param  {[type]} padre  donde se encuentra el scroll
     * @param  {[type]} id     donde se quiere llegar
     */
    scrollTo(padre, id)  {
        id = id.replace("link", "");
        $(padre).animate({
            scrollTop: $(id).position().top},
            'slow');
    },
    hash: {
        permiso(value) {
            return Tools.remplazarTilde(value.toLowerCase().trim()).replace(/\W+/g, '_');
        }
    },
    traePermisos(codigo, permisos) {
        return permisos.permisos[_.findIndex(permisos.permisos, [
            'codigo',
            codigo
        ])].valor;
    },

    /**
     * Funcion para validar un run chileno, ya sea si se ingresa con guion o sin el
     * @param {string | Integer} run Run con o sin guion que se quiera validar
     */
    validarRun(run){
        run = run.trim().split('.').join('');
        const vG        = /^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( run );
        const vN        = /^[0-9kK]{8,9}$/.test(run); // se agrega validacion para rut terminados en k y K
        const inv       = /^(.)\1+$/;
        let rut         = '';
        let digv        = '';
        if ( vG ) { //validacion con guion
            const tmp 	= run.split('-');
            rut 	= tmp[0];
            digv	= tmp[1];
        } else if( vN ) { //validacion con numeros
            rut     = run.slice(0, -1);
            digv    = run.slice(-1);
        } else
            return false;
        if ( inv.test(rut) ) return false;
        if ( digv == 'K' ) digv = 'k';
        function dv(T){
            let M=0,S=1;
            for(;T;T=Math.floor(T/10))
                S=(S+T%10*(9-M++%6))%11;
            return S?S-1:'k';
        }
        return dv(rut) == digv;
    },

    /**
     * Funcion para formeatear un run chileno, ya sea si se ingresa con guion o sin el
     * Para esto, se quitan todos los puntos y guiones, para posteriormente agregar
     * un guion antes del digito verificador
     * @param {string | Integer} run Run con o sin guion que se quiera validar
     */
    formatearRUN(run) {
        run = run.trim().split('.').join('').split('-').join('')
        return `${run.slice(0, run.length - 1)}-${run.slice(-1, run.length)}`
    },

    /**
     * Función para obtener la
     */
    toHHMMSS(hora) {
        var sec_num = parseInt(hora, 10); // don't forget the second param
        var hours   = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
        var seconds = sec_num - (hours * 3600) - (minutes * 60);

        if (hours   < 10) {hours   = "0"+hours;}
        if (minutes < 10) {minutes = "0"+minutes;}
        if (seconds < 10) {seconds = "0"+seconds;}
        return `${minutes}:${seconds}` //adaptacion para el algoritmo de lebox
        // return hours+':'+minutes+':'+seconds;
    }
};

export default Tools;