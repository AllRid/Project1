<?php
class CoupontManager
{
    function registerCoupon($code)
        {
                $coupon = Coupont::model()->findByPk($code);
                if(!$coupon)
                        return false;

                echo "Coupon registered. $coupon->description";
                return $coupon->delete();
        }
}

