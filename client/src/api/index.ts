import axios from 'axios';

const SERVER_API = `http://127.0.0.1:8080/api`;

export const clientApi = axios.create({
  baseURL: SERVER_API,
});
