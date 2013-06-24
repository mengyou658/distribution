<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"         => "必须接受 :attribute 。",
	"active_url"       => " :attribute 不是有效的 URL。",
	"after"            => " :attribute 必须为 :date 之后的日期。",
	"alpha"            => " :attribute 仅可包含英文字母。",
	"alpha_dash"       => " :attribute 仅可包含英文字母、数字和短横线。",
	"alpha_num"        => " :attribute 仅可包含英文字母和数字。",
	"before"           => " :attribute 必须为 :date 之前的日期。",
	"between"          => array(
		"numeric" => " :attribute 必须介于 :min - :max 之间。",
		"file"    => " :attribute 必须介于 :min - :max KB 之间。",
		"string"  => " :attribute 必须介于 :min - :max 个字符之间。",
	),
	"confirmed"        => " :attribute 确认不匹配。",
	"date"             => " :attribute 不是有效的日期。",
	"date_format"      => " :attribute 与格式 :format 不匹配。",
	"different"        => " :attribute 和 :other 必须不相同。",
	"digits"           => " :attribute 必须为 :digits 位数字。",
	"digits_between"   => " :attribute 必须介于 :min 和 :max 位数字之间。",
	"email"            => " :attribute 格式无效。",
	"exists"           => "选中的 :attribute 无效。",
	"image"            => " :attribute 必须为一幅图片。",
	"in"               => "选中的 :attribute 无效。",
	"integer"          => " :attribute 必须为一个整数。",
	"ip"               => " :attribute 必须为一个有效的 IP 地址。",
	"max"              => array(
		"numeric" => " :attribute 不可大于 :max 。",
		"file"    => " :attribute 不可大于 :max KB。",
		"string"  => " :attribute 不可多于 :max 个字符。",
	),
	"mimes"            => " :attribute 必须为一个 :values 类型的文件。",
	"min"              => array(
		"numeric" => " :attribute 的长度至少应为 :min 。",
		"file"    => " :attribute 的大小至少应为 :min KB。",
		"string"  => " :attribute 至少应含 :min 个字符。",
	),
	"not_in"           => "选中的 :attribute 无效。",
	"numeric"          => " :attribute 必须为一个数字。",
	"regex"            => " :attribute 格式无效。",
	"required"         => " :attribute 是必填域。",
	"required_if"      => "当 :other 为 :value 时， :attribute 是必填域。",
	"required_with"    => "当 :values 出现时， :attribute 是必填域。",
	"required_without" => "当 :values 不出现时， :attribute 是必填域。",
	"same"             => " :attribute 和 :other 必须匹配。",
	"size"             => array(
		"numeric" => " :attribute 的大小必须为 :size 。",
		"file"    => " :attribute 的大小必须为 :size KB。",
		"string"  => " :attribute 必须包含 :size 个字符。",
	),
	"unique"           => " :attribute 已被占用。",
	"url"              => " :attribute 是无效的格式。",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
