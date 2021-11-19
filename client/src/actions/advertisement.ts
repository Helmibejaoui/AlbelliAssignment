import {createAsyncThunk} from '@reduxjs/toolkit';
import {clientApi} from "../api";

export const addAdvertisement = createAsyncThunk(
    'advertisements/add',
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    async ({anyArgs}: any, {rejectWithValue}) => {
        try {
            const {data} = await clientApi.post('/advertisements', anyArgs);
            return data;
        } catch (error) {
            return rejectWithValue(error.message);
        }
    },
);
