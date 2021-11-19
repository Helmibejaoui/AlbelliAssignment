import axios from 'axios';

const SERVER_API = `http://php:9000/api`;

export const clientApi = axios.create({
  baseURL: SERVER_API,
});
