<?php

namespace CoMAPI\Generate\Case;

use CommonRoutes\AbstractRoute;
use Faker\Factory;

class RiftInvolvement extends AbstractRoute
{


    private \Faker\Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $riftInvolvementList = [
            "The Rift committed the Crime, Wronged someone, or is causing the Problem.",
            "The existence, presence, or activity of this Rift puts at risk something important to a resident or residents of the City: their lives, their health, their property, their own (possibly illegal) activity, their lifestyle, their quality of life, etc.",
            "This Rift clashed with another legendary or mundane individual or group, either because of their Mythos or Logos, and possibly affecting others in the process.",
            "The Rift has taken the first steps in a planned crime or a scheme targeting a person of importance, a group, a population, or the lead characters themselves.",
            "The Rift is a victim of a crime, or was used by someone else for some wrongdoing, either knowingly or unknowingly.",
            "The instigating Rift for this case isn't human; it's an Enclave, a Relic or a Familiar. However, this instigating Rift is sought by others (most likely the human Rift(s) you've created), but maybe by other Rifts who are part of the same mythical story."
        ];

        $riftInvolvement = $this->faker->randomElement($riftInvolvementList);

        return ['rift_involvement' => $riftInvolvement];
    }
}