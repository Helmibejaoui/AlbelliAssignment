import {createAsyncThunk} from '@reduxjs/toolkit';
import {clientApi} from "../api";
import {FormAdvertisement} from "../model/Advertisement";

export const addAdvertisement = createAsyncThunk(
    'advertisements/add',
    async (values: FormAdvertisement, {rejectWithValue}) => {
        try {
            const {data} = await clientApi.post('/advertisements', {
                ...values,
                validUntil: new Date(values.validUntil).toLocaleDateString("fr-FR")
            });
            return data;
        } catch (error) {
            return rejectWithValue(error);
        }
    },
);
export const getAdvertisements = createAsyncThunk(
    'advertisements/get',
    async (values: string[], {rejectWithValue}) => {
        try {
            const {data} = await clientApi.get('/advertisements');
            return data;
        } catch (error) {
            return rejectWithValue(error);
        }
    },
);

export const getAdvertisement = createAsyncThunk(
    'advertisement/get',
    async (id: string, {rejectWithValue}) => {
        try {
            const {data} = await clientApi.get('/advertisements/' + id);
            return data;
        } catch (error) {
            return rejectWithValue(error);
        }
    },
);

export const deleteAdvertisement = createAsyncThunk(
    'advertisement/delete',
    async (id: string, {rejectWithValue}) => {
        try {
            await clientApi.delete('/advertisements/' + id);
            return id;
        } catch (error) {
            return rejectWithValue(error);
        }
    },
);

export const editAdvertisement = createAsyncThunk(
    'advertisement/edit',
    async ({values, id}: { values: FormAdvertisement, id: string }, {rejectWithValue}) => {
        try {
            delete values.id;
            const {data} = await clientApi.put('/advertisements/' + id, {
                ...values,
                validUntil: new Date(values.validUntil).toLocaleDateString("fr-FR")
            });
            return data;
        } catch (error) {
            return rejectWithValue(error);
        }
    },
);
