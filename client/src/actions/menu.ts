import {createAsyncThunk} from '@reduxjs/toolkit';
import {clientApi} from "../api";

export const getMenu = createAsyncThunk(
    'menu/get',
    async (_,{rejectWithValue}) => {
        try {
            const {data} = await clientApi.get('/menu');
            return data;
        } catch (error) {
            return rejectWithValue(error.message);
        }
    },
);
