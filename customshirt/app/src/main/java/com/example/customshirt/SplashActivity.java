package com.example.customshirt;

import android.content.Intent;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageView;

public class SplashActivity extends AppCompatActivity implements View.OnClickListener {

    Animation frombottom;
    Animation fromtop;
    Button splashbutton;
    ImageView splashicon;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);

        splashbutton= (Button) findViewById(R.id.splashbutton);
        splashicon = (ImageView) findViewById(R.id.splashicon);
        frombottom = AnimationUtils.loadAnimation(this,R.anim.frombottom);
        fromtop = AnimationUtils.loadAnimation(this,R.anim.fromtop);
        splashicon.setAnimation(fromtop);
        splashbutton.setAnimation(frombottom);
        splashbutton.setOnClickListener(this);



    }

    @Override
    public void onClick(View v) {

        if(v == splashbutton){
            startActivity(new Intent(SplashActivity.this,LoginActivity.class));
        }
    }
}
