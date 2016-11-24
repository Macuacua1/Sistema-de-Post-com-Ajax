<?php
namespace App;
use Laravel\Socialite\Contracts\User as ProviderUser;
class SocialAccountService
{
    public function createOrGetUserGoogle(ProviderUser $providerUser)
    {
        $account = Socialprovider::whereProvider('google')
            ->whereProviderId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new Socialprovider([
                'provider_id' => $providerUser->getId(),
                'provider' => 'google'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
    public function createOrGetUserFacebook(ProviderUser $providerUser)
    {
        $account = Socialprovider::whereProvider('facebook')
            ->whereProviderId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new Socialprovider([
                'provider_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
    public function createOrGetUserTwitter(ProviderUser $providerUser)
    {
        $account = Socialprovider::whereProvider('twitter')
            ->whereProviderId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new Socialprovider([
                'provider_id' => $providerUser->getId(),
                'provider' => 'twitter'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}