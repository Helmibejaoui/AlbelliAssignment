import {createSlice, PayloadAction} from '@reduxjs/toolkit';
import {
    addAdvertisement,
    deleteAdvertisement,
    editAdvertisement,
    getAdvertisement,
    getAdvertisements
} from "../../actions/advertisement";
import {Advertisement} from "../../model/Advertisement";


export type advertisementState = {
    loading: boolean;
    status: boolean;
    advertisements: Advertisement[];
    advertisement?: Advertisement;

};

const initialState: advertisementState = {
    loading: false,
    status: false,
    advertisements: [],
};
export const advertisementSlice = createSlice({
    name: 'advertisements',
    initialState,
    reducers: {
        /*incrementAction: (state) => {
          state.count += 1;
        },*/
    },
    extraReducers: {
        [addAdvertisement.pending.type]: (state) => {
            state.loading = true;
        },
        [addAdvertisement.fulfilled.type]: (state, {payload}: PayloadAction<boolean>) => {
            state.status = payload;
        },
        [addAdvertisement.rejected.type]: (state) => {
            state.loading = false;
        },

        [getAdvertisements.pending.type]: (state) => {
            state.loading = true;
        },
        [getAdvertisements.fulfilled.type]: (state, {payload}: PayloadAction<Advertisement[]>) => {
            state.advertisements = payload;
        },
        [getAdvertisements.rejected.type]: (state) => {
            state.loading = false;
        },

        [getAdvertisement.pending.type]: (state) => {
            state.loading = true;
        },
        [getAdvertisement.fulfilled.type]: (state, {payload}: PayloadAction<Advertisement>) => {
            state.advertisement = payload;
        },
        [getAdvertisement.rejected.type]: (state) => {
            state.loading = false;
        },

        [editAdvertisement.pending.type]: (state) => {
            state.loading = true;
        },
        [editAdvertisement.fulfilled.type]: (state, {payload}: PayloadAction<boolean>) => {
            state.status = payload;
        },
        [editAdvertisement.rejected.type]: (state) => {
            state.loading = false;
        },

        [deleteAdvertisement.pending.type]: (state) => {
            state.loading = true;
        },
        [deleteAdvertisement.fulfilled.type]: (state, {payload}: PayloadAction<string>) => {
            state.advertisements = state.advertisements.filter(a=>a.id!==payload);
        },
        [deleteAdvertisement.rejected.type]: (state) => {
            state.loading = false;
        },
    },
});

//export const {incrementAction} = advertisementSlice.actions;
export default advertisementSlice.reducer;
