<template>
    <span>{{convertedDateTime}}</span>
    </template>
    <script>
    import moment from 'moment-timezone';
    moment.tz.setDefault('Asia/Kolkata');
    export default {
      name: "TimeAgo",
      props:{
        dateTime:{
          required:true,
        }
      },
      computed:{
        convertedDateTime(){
         return moment(this.dateTime).local().fromNow();
        }
      }
    }
    </script>
