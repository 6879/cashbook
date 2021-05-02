import moment from 'moment'
import Vue from 'vue'

Vue.filter('timeformat',(ags)=>{
  return moment(ags).format('MM/DD/YYYY');
})

Vue.filter('shortlength',(text,length,suffix)=>{
  return text.substr(0,length)+suffix;
})
