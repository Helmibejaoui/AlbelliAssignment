import {createAsyncThunk} from '@reduxjs/toolkit';
import {clientApi} from "../api";
import {FormAdvertisement} from "../model/Advertisement";
import {toast} from "react-toastify";

export const addAdvertisement = createAsyncThunk(
    'advertisements/add',
    async (values: FormAdvertisement, {rejectWithValue}) => {
        try {
            const {data} = await clientApi.post('/advertisements', {
                ...values,
                validUntil: new Date(values.validUntil).toLocaleDateString("fr-FR")
            });
            toast.success("Item added");
            return data;
        } catch (error) {
            if (error.response) {
                Object.keys(error.response.data.data).map(function (key, index) {
                    toast.error(error.response.data.data[key]);
                });
            }


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
            toast.error("Item not found");
            return rejectWithValue(error);
        }
    },
);

export const deleteAdvertisement = createAsyncThunk(
    'advertisement/delete',
    async (id: string, {rejectWithValue}) => {
        try {
            await clientApi.delete('/advertisements/' + id);
            toast.success("Item deleted");
            return id;
        } catch (error) {
            toast.error("Can't delete this item");
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
            toast.success("Item updated");
            return data;
        } catch (error) {
            if (error.response) {
                Object.keys(error.response.data.data).map(function (key, index) {
                    toast.error(error.response.data.data[key]);
                });
            }
            return rejectWithValue(error);
        }
    },
);
