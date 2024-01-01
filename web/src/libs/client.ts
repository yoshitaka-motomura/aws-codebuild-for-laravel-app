import axios from 'axios'

export const requestClient = axios.create({
  withCredentials: true
})
