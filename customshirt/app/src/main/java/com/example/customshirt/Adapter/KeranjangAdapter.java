package com.example.customshirt.Adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.customshirt.DetailItem;
import com.example.customshirt.Model.Item.Item;
import com.example.customshirt.Model.Keranjang.Keranjang;
import com.example.customshirt.R;

import java.util.ArrayList;
import java.util.List;

public class KeranjangAdapter extends RecyclerView.Adapter<KeranjangAdapter.MyViewHolder>{
    List<Keranjang> mKeranjangList;

    public KeranjangAdapter(List<Keranjang> KeranjangList) {
        mKeranjangList = KeranjangList;
    }

    @Override
    public MyViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.keranjang_list, parent, false);
        MyViewHolder mViewHolder = new MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(MyViewHolder holder, final int position) {
//        holder.mTextViewId.setText(mKeranjangList.get(position).getId_pengguna());
        holder.mTextViewWarna.setText(mKeranjangList.get(position).getNama_desain());
        holder.mTextViewHarga.setText( mKeranjangList.get(position).getSubtotal_harga());
        holder.mTextViewUkuran.setText( mKeranjangList.get(position).getSubtotal_berat());
        holder.mTextViewJumlah.setText( mKeranjangList.get(position).getJumlah());


//        int overTotalPrice=0;
//        int oneTyprProductTprice = (Integer.valueOf(mKeranjangList.get(position).getSubtotal_harga()) * Integer.valueOf(mKeranjangList.get(position).getJumlah()));
//        overTotalPrice = overTotalPrice + oneTyprProductTprice;

    }


    @Override
    public int getItemCount() {
        return mKeranjangList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNama, mTextViewHarga,mTextViewWarna,mTextViewUkuran,mTextViewJumlah;

        public MyViewHolder(View keranjangView) {
            super(keranjangView);
//            mTextViewId = (TextView) itemView.findViewById(R.id.tvId);
            mTextViewNama = (TextView) keranjangView.findViewById(R.id.tv_nama_item);
            mTextViewWarna = (TextView) keranjangView.findViewById(R.id.txt_warna);
            mTextViewUkuran = (TextView) keranjangView.findViewById(R.id.txt_ukuran);
            mTextViewJumlah = (TextView) keranjangView.findViewById(R.id.txt_jumlah);
            mTextViewHarga = (TextView) keranjangView.findViewById(R.id.txt_harga);
        }
    }
}
