<?php
namespace Lynk\LynkAdmin\Servers\JwtServer;

use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Token\Builder;

class JwtServer
{
    public function getJwtToken()
    {
        $tokenBuilder = new Builder(new JoseEncoder(),ChainedFormatter::default());
        $algorithm = new Sha256();
        $test = random_bytes(32);
        $signingKey = InMemory::plainText($test);
        $now = new \DateTimeImmutable();
        dd($test,$signingKey,$now);


    }
}

