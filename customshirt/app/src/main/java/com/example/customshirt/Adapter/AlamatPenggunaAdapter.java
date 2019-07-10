package com.example.customshirt.Adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

import com.example.customshirt.Model.AlamatPengguna.AlamatPengguna;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.PopupDeleteCart;
import com.example.customshirt.R;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;

import java.util.List;

public class AlamatPenggunaAdapter extends RecyclerView.Adapter<AlamatPenggunaAdapter.MyViewHolder>{

    List<AlamatPengguna> mAlamatPenggunaList;
    ApiInterface mApiInterface;
    public TextView mTextViewId;
    public AlamatPenggunaAdapter(List<AlamatPengguna> AlamatPenggunaList) {
        mAlamatPenggunaList = AlamatPenggunaList;
    }

    @Override
    public AlamatPenggunaAdapter.MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.list_alamat, parent, false);
        AlamatPenggunaAdapter.MyViewHolder mViewHolder = new AlamatPenggunaAdapter.MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(AlamatPenggunaAdapter.MyViewHolder holder, final int position) {
        holder.mTextViewId.setText(mAlamatPenggunaList.get(position).getId_alamat());
        holder.mTextViewProvinsi.setText(mAlamatPenggunaList.get(position).getNama_provinsi());
//        holder.mTextViewHarga.setText(mKeranjangList.get(position).getNama_desain());
        holder.mTextViewKota.setText( mAlamatPenggunaList.get(position).getNama_kota());
        holder.mTextViewKodepos.setText( mAlamatPenggunaList.get(position).getKode_pos());
        holder.mTextViewAlamat.setText( mAlamatPenggunaList.get(position).getAlamat_lengkap());


    }


    @Override
    public int getItemCount() {
        return mAlamatPenggunaList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewProvinsi, mTextViewKota,mTextViewKodepos,mTextViewAlamat,mTextViewJumlah,
                mTextViewTotal;
        public Button btn_hapus;

        public MyViewHolder(View keranjangView) {
            super(keranjangView);
            mTextViewId = (TextView) itemView.findViewById(R.id.tv_id_alamat);
            mTextViewProvinsi = (TextView) keranjangView.findViewById(R.id.tv_provinsi);
            mTextViewKota = (TextView) keranjangView.findViewById(R.id.tv_kota);
            mTextViewKodepos = (TextView) keranjangView.findViewById(R.id.tv_kode_pos);
            mTextViewAlamat = (TextView) keranjangView.findViewById(R.id.tv_alamat_lengkap);
        }
    }

}
