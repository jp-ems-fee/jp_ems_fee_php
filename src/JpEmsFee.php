<?php
namespace JpEmsFee;

use Symfony\Component\Yaml\Parser;

class JpEmsFee
{
  public static function asia($weight)
  {
    return self::base($weight, "asia");
  }

  public static function oceania($weight)
  {
    return self::base($weight, 'oceania');
  }

  public static function europa($weight)
  {
    return self::base($weight, "europa");
  }

  public static function africa($weight)
  {
    return self::base($weight, 'africa');
  }

  private static function base($weight, $method_name)
  {
    self::validate_weight_limit($weight);
    return self::calculate($weight, $method_name);
  }

  private static function validate_weight_limit($weight)
  {
    if ($weight <= 0) {
      throw new \Exception("Weight Limit Under");
    } elseif ($weight > 30000) {
      throw new \Exception("Weight Limit Over");
    }
  }

  private static function calculate($weight, $area_name)
  {
    $yaml_parser = new Parser();
    $yaml = $yaml_parser->parse(file_get_contents('./ems_base_file.yaml'));
    foreach ($yaml[$area_name] as $key => $price) {
      if ($key >= $weight) {
        return $price;
      }
    }
    return 0;
  }

}
