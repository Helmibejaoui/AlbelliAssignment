import {createSlice, PayloadAction} from '@reduxjs/toolkit';
import {addAdvertisement} from "../../actions/advertisement";


export type advertisementState = {
    loading: boolean;
    status: boolean;

};

const initialState: advertisementState = {
    loading: false,
    status: false,
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
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        [addAdvertisement.fulfilled.type]: (state, {payload}: PayloadAction<boolean>) => {
            state.status = payload;
        },
        [addAdvertisement.rejected.type]: (state) => {
            state.loading = false;
        },
    },
});

//export const {incrementAction} = advertisementSlice.actions;
export default advertisementSlice.reducer;
