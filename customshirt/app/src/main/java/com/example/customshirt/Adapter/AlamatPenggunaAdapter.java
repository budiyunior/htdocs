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
        View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.keranjang_list, parent, false);
        AlamatPenggunaAdapter.MyViewHolder mViewHolder = new AlamatPenggunaAdapter.MyViewHolder(mView);
        return mViewHolder;
    }

    @Override
    public void onBindViewHolder(AlamatPenggunaAdapter.MyViewHolder holder, final int position) {
//        holder.mTextViewId.setText(mAlamatPenggunaList.get(position).getId_desain());
//        holder.mTextViewNama.setText(mAlamatPenggunaList.get(position).getNama_desain());
////        holder.mTextViewHarga.setText(mKeranjangList.get(position).getNama_desain());
//        holder.mTextViewTotal.setText( mAlamatPenggunaList.get(position).getSubtotal_harga());
//        holder.mTextViewUkuran.setText( mAlamatPenggunaList.get(position).getUkuran_shirt());
//        holder.mTextViewJumlah.setText( mAlamatPenggunaList.get(position).getJumlah());
//        holder.mTextViewJumlah.setText( mAlamatPenggunaList.get(position).getJumlah());
//        holder.btn_hapus.setOnClickListener(new View.OnClickListener() {
//            @Override
//            public void onClick(View v) {
//                Intent mIntent = new Intent(v.getContext(), PopupDeleteCart.class);
//                mIntent.putExtra("id_desain", mAlamatPenggunaList.get(position).getId_desain());
//                v.getContext().startActivity(mIntent);
//            }
//        });

    }


    @Override
    public int getItemCount() {
        return mAlamatPenggunaList.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        public TextView mTextViewId, mTextViewNama, mTextViewHarga,mTextViewWarna,mTextViewUkuran,mTextViewJumlah,
                mTextViewTotal;
        public Button btn_hapus;

        public MyViewHolder(View keranjangView) {
            super(keranjangView);
            mTextViewId = (TextView) itemView.findViewById(R.id.id_desain);
            mTextViewNama = (TextView) keranjangView.findViewById(R.id.tv_nama_item);
            mTextViewUkuran = (TextView) keranjangView.findViewById(R.id.txt_ukuran);
            mTextViewJumlah = (TextView) keranjangView.findViewById(R.id.txt_jumlah);
            mTextViewHarga = (TextView) keranjangView.findViewById(R.id.txt_harga);
            mTextViewTotal = (TextView) keranjangView.findViewById(R.id.txt_total);
            btn_hapus = (Button) keranjangView.findViewById(R.id.btn_edit);
        }
    }

}
