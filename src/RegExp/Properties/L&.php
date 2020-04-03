<?php

/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

namespace Remorhaz\UniLex\Tool\RegExp\Properties;

use Remorhaz\UniLex\RegExp\FSM\Range;
use Remorhaz\UniLex\RegExp\FSM\RangeSet;

/** phpcs:disable Generic.Files.LineLength.TooLong */
return RangeSet::loadUnsafe(new Range(0x41, 0x5a), new Range(0xc0, 0xd6), new Range(0xd8, 0xde), new Range(0x100), new Range(0x102), new Range(0x104), new Range(0x106), new Range(0x108), new Range(0x10a), new Range(0x10c), new Range(0x10e), new Range(0x110), new Range(0x112), new Range(0x114), new Range(0x116), new Range(0x118), new Range(0x11a), new Range(0x11c), new Range(0x11e), new Range(0x120), new Range(0x122), new Range(0x124), new Range(0x126), new Range(0x128), new Range(0x12a), new Range(0x12c), new Range(0x12e), new Range(0x130), new Range(0x132), new Range(0x134), new Range(0x136), new Range(0x139), new Range(0x13b), new Range(0x13d), new Range(0x13f), new Range(0x141), new Range(0x143), new Range(0x145), new Range(0x147), new Range(0x14a), new Range(0x14c), new Range(0x14e), new Range(0x150), new Range(0x152), new Range(0x154), new Range(0x156), new Range(0x158), new Range(0x15a), new Range(0x15c), new Range(0x15e), new Range(0x160), new Range(0x162), new Range(0x164), new Range(0x166), new Range(0x168), new Range(0x16a), new Range(0x16c), new Range(0x16e), new Range(0x170), new Range(0x172), new Range(0x174), new Range(0x176), new Range(0x178, 0x179), new Range(0x17b), new Range(0x17d), new Range(0x181, 0x182), new Range(0x184), new Range(0x186, 0x187), new Range(0x189, 0x18b), new Range(0x18e, 0x191), new Range(0x193, 0x194), new Range(0x196, 0x198), new Range(0x19c, 0x19d), new Range(0x19f, 0x1a0), new Range(0x1a2), new Range(0x1a4), new Range(0x1a6, 0x1a7), new Range(0x1a9), new Range(0x1ac), new Range(0x1ae, 0x1af), new Range(0x1b1, 0x1b3), new Range(0x1b5), new Range(0x1b7, 0x1b8), new Range(0x1bc), new Range(0x1c4), new Range(0x1c7), new Range(0x1ca), new Range(0x1cd), new Range(0x1cf), new Range(0x1d1), new Range(0x1d3), new Range(0x1d5), new Range(0x1d7), new Range(0x1d9), new Range(0x1db), new Range(0x1de), new Range(0x1e0), new Range(0x1e2), new Range(0x1e4), new Range(0x1e6), new Range(0x1e8), new Range(0x1ea), new Range(0x1ec), new Range(0x1ee), new Range(0x1f1), new Range(0x1f4), new Range(0x1f6, 0x1f8), new Range(0x1fa), new Range(0x1fc), new Range(0x1fe), new Range(0x200), new Range(0x202), new Range(0x204), new Range(0x206), new Range(0x208), new Range(0x20a), new Range(0x20c), new Range(0x20e), new Range(0x210), new Range(0x212), new Range(0x214), new Range(0x216), new Range(0x218), new Range(0x21a), new Range(0x21c), new Range(0x21e), new Range(0x220), new Range(0x222), new Range(0x224), new Range(0x226), new Range(0x228), new Range(0x22a), new Range(0x22c), new Range(0x22e), new Range(0x230), new Range(0x232), new Range(0x23a, 0x23b), new Range(0x23d, 0x23e), new Range(0x241), new Range(0x243, 0x246), new Range(0x248), new Range(0x24a), new Range(0x24c), new Range(0x24e), new Range(0x370), new Range(0x372), new Range(0x376), new Range(0x37f), new Range(0x386), new Range(0x388, 0x38a), new Range(0x38c), new Range(0x38e, 0x38f), new Range(0x391, 0x3a1), new Range(0x3a3, 0x3ab), new Range(0x3cf), new Range(0x3d2, 0x3d4), new Range(0x3d8), new Range(0x3da), new Range(0x3dc), new Range(0x3de), new Range(0x3e0), new Range(0x3e2), new Range(0x3e4), new Range(0x3e6), new Range(0x3e8), new Range(0x3ea), new Range(0x3ec), new Range(0x3ee), new Range(0x3f4), new Range(0x3f7), new Range(0x3f9, 0x3fa), new Range(0x3fd, 0x42f), new Range(0x460), new Range(0x462), new Range(0x464), new Range(0x466), new Range(0x468), new Range(0x46a), new Range(0x46c), new Range(0x46e), new Range(0x470), new Range(0x472), new Range(0x474), new Range(0x476), new Range(0x478), new Range(0x47a), new Range(0x47c), new Range(0x47e), new Range(0x480), new Range(0x48a), new Range(0x48c), new Range(0x48e), new Range(0x490), new Range(0x492), new Range(0x494), new Range(0x496), new Range(0x498), new Range(0x49a), new Range(0x49c), new Range(0x49e), new Range(0x4a0), new Range(0x4a2), new Range(0x4a4), new Range(0x4a6), new Range(0x4a8), new Range(0x4aa), new Range(0x4ac), new Range(0x4ae), new Range(0x4b0), new Range(0x4b2), new Range(0x4b4), new Range(0x4b6), new Range(0x4b8), new Range(0x4ba), new Range(0x4bc), new Range(0x4be), new Range(0x4c0, 0x4c1), new Range(0x4c3), new Range(0x4c5), new Range(0x4c7), new Range(0x4c9), new Range(0x4cb), new Range(0x4cd), new Range(0x4d0), new Range(0x4d2), new Range(0x4d4), new Range(0x4d6), new Range(0x4d8), new Range(0x4da), new Range(0x4dc), new Range(0x4de), new Range(0x4e0), new Range(0x4e2), new Range(0x4e4), new Range(0x4e6), new Range(0x4e8), new Range(0x4ea), new Range(0x4ec), new Range(0x4ee), new Range(0x4f0), new Range(0x4f2), new Range(0x4f4), new Range(0x4f6), new Range(0x4f8), new Range(0x4fa), new Range(0x4fc), new Range(0x4fe), new Range(0x500), new Range(0x502), new Range(0x504), new Range(0x506), new Range(0x508), new Range(0x50a), new Range(0x50c), new Range(0x50e), new Range(0x510), new Range(0x512), new Range(0x514), new Range(0x516), new Range(0x518), new Range(0x51a), new Range(0x51c), new Range(0x51e), new Range(0x520), new Range(0x522), new Range(0x524), new Range(0x526), new Range(0x528), new Range(0x52a), new Range(0x52c), new Range(0x52e), new Range(0x531, 0x556), new Range(0x10a0, 0x10c5), new Range(0x10c7), new Range(0x10cd), new Range(0x13a0, 0x13f5), new Range(0x1c90, 0x1cba), new Range(0x1cbd, 0x1cbf), new Range(0x1e00), new Range(0x1e02), new Range(0x1e04), new Range(0x1e06), new Range(0x1e08), new Range(0x1e0a), new Range(0x1e0c), new Range(0x1e0e), new Range(0x1e10), new Range(0x1e12), new Range(0x1e14), new Range(0x1e16), new Range(0x1e18), new Range(0x1e1a), new Range(0x1e1c), new Range(0x1e1e), new Range(0x1e20), new Range(0x1e22), new Range(0x1e24), new Range(0x1e26), new Range(0x1e28), new Range(0x1e2a), new Range(0x1e2c), new Range(0x1e2e), new Range(0x1e30), new Range(0x1e32), new Range(0x1e34), new Range(0x1e36), new Range(0x1e38), new Range(0x1e3a), new Range(0x1e3c), new Range(0x1e3e), new Range(0x1e40), new Range(0x1e42), new Range(0x1e44), new Range(0x1e46), new Range(0x1e48), new Range(0x1e4a), new Range(0x1e4c), new Range(0x1e4e), new Range(0x1e50), new Range(0x1e52), new Range(0x1e54), new Range(0x1e56), new Range(0x1e58), new Range(0x1e5a), new Range(0x1e5c), new Range(0x1e5e), new Range(0x1e60), new Range(0x1e62), new Range(0x1e64), new Range(0x1e66), new Range(0x1e68), new Range(0x1e6a), new Range(0x1e6c), new Range(0x1e6e), new Range(0x1e70), new Range(0x1e72), new Range(0x1e74), new Range(0x1e76), new Range(0x1e78), new Range(0x1e7a), new Range(0x1e7c), new Range(0x1e7e), new Range(0x1e80), new Range(0x1e82), new Range(0x1e84), new Range(0x1e86), new Range(0x1e88), new Range(0x1e8a), new Range(0x1e8c), new Range(0x1e8e), new Range(0x1e90), new Range(0x1e92), new Range(0x1e94), new Range(0x1e9e), new Range(0x1ea0), new Range(0x1ea2), new Range(0x1ea4), new Range(0x1ea6), new Range(0x1ea8), new Range(0x1eaa), new Range(0x1eac), new Range(0x1eae), new Range(0x1eb0), new Range(0x1eb2), new Range(0x1eb4), new Range(0x1eb6), new Range(0x1eb8), new Range(0x1eba), new Range(0x1ebc), new Range(0x1ebe), new Range(0x1ec0), new Range(0x1ec2), new Range(0x1ec4), new Range(0x1ec6), new Range(0x1ec8), new Range(0x1eca), new Range(0x1ecc), new Range(0x1ece), new Range(0x1ed0), new Range(0x1ed2), new Range(0x1ed4), new Range(0x1ed6), new Range(0x1ed8), new Range(0x1eda), new Range(0x1edc), new Range(0x1ede), new Range(0x1ee0), new Range(0x1ee2), new Range(0x1ee4), new Range(0x1ee6), new Range(0x1ee8), new Range(0x1eea), new Range(0x1eec), new Range(0x1eee), new Range(0x1ef0), new Range(0x1ef2), new Range(0x1ef4), new Range(0x1ef6), new Range(0x1ef8), new Range(0x1efa), new Range(0x1efc), new Range(0x1efe), new Range(0x1f08, 0x1f0f), new Range(0x1f18, 0x1f1d), new Range(0x1f28, 0x1f2f), new Range(0x1f38, 0x1f3f), new Range(0x1f48, 0x1f4d), new Range(0x1f59), new Range(0x1f5b), new Range(0x1f5d), new Range(0x1f5f), new Range(0x1f68, 0x1f6f), new Range(0x1fb8, 0x1fbb), new Range(0x1fc8, 0x1fcb), new Range(0x1fd8, 0x1fdb), new Range(0x1fe8, 0x1fec), new Range(0x1ff8, 0x1ffb), new Range(0x2102), new Range(0x2107), new Range(0x210b, 0x210d), new Range(0x2110, 0x2112), new Range(0x2115), new Range(0x2119, 0x211d), new Range(0x2124), new Range(0x2126), new Range(0x2128), new Range(0x212a, 0x212d), new Range(0x2130, 0x2133), new Range(0x213e, 0x213f), new Range(0x2145), new Range(0x2183), new Range(0x2c00, 0x2c2e), new Range(0x2c60), new Range(0x2c62, 0x2c64), new Range(0x2c67), new Range(0x2c69), new Range(0x2c6b), new Range(0x2c6d, 0x2c70), new Range(0x2c72), new Range(0x2c75), new Range(0x2c7e, 0x2c80), new Range(0x2c82), new Range(0x2c84), new Range(0x2c86), new Range(0x2c88), new Range(0x2c8a), new Range(0x2c8c), new Range(0x2c8e), new Range(0x2c90), new Range(0x2c92), new Range(0x2c94), new Range(0x2c96), new Range(0x2c98), new Range(0x2c9a), new Range(0x2c9c), new Range(0x2c9e), new Range(0x2ca0), new Range(0x2ca2), new Range(0x2ca4), new Range(0x2ca6), new Range(0x2ca8), new Range(0x2caa), new Range(0x2cac), new Range(0x2cae), new Range(0x2cb0), new Range(0x2cb2), new Range(0x2cb4), new Range(0x2cb6), new Range(0x2cb8), new Range(0x2cba), new Range(0x2cbc), new Range(0x2cbe), new Range(0x2cc0), new Range(0x2cc2), new Range(0x2cc4), new Range(0x2cc6), new Range(0x2cc8), new Range(0x2cca), new Range(0x2ccc), new Range(0x2cce), new Range(0x2cd0), new Range(0x2cd2), new Range(0x2cd4), new Range(0x2cd6), new Range(0x2cd8), new Range(0x2cda), new Range(0x2cdc), new Range(0x2cde), new Range(0x2ce0), new Range(0x2ce2), new Range(0x2ceb), new Range(0x2ced), new Range(0x2cf2), new Range(0xa640), new Range(0xa642), new Range(0xa644), new Range(0xa646), new Range(0xa648), new Range(0xa64a), new Range(0xa64c), new Range(0xa64e), new Range(0xa650), new Range(0xa652), new Range(0xa654), new Range(0xa656), new Range(0xa658), new Range(0xa65a), new Range(0xa65c), new Range(0xa65e), new Range(0xa660), new Range(0xa662), new Range(0xa664), new Range(0xa666), new Range(0xa668), new Range(0xa66a), new Range(0xa66c), new Range(0xa680), new Range(0xa682), new Range(0xa684), new Range(0xa686), new Range(0xa688), new Range(0xa68a), new Range(0xa68c), new Range(0xa68e), new Range(0xa690), new Range(0xa692), new Range(0xa694), new Range(0xa696), new Range(0xa698), new Range(0xa69a), new Range(0xa722), new Range(0xa724), new Range(0xa726), new Range(0xa728), new Range(0xa72a), new Range(0xa72c), new Range(0xa72e), new Range(0xa732), new Range(0xa734), new Range(0xa736), new Range(0xa738), new Range(0xa73a), new Range(0xa73c), new Range(0xa73e), new Range(0xa740), new Range(0xa742), new Range(0xa744), new Range(0xa746), new Range(0xa748), new Range(0xa74a), new Range(0xa74c), new Range(0xa74e), new Range(0xa750), new Range(0xa752), new Range(0xa754), new Range(0xa756), new Range(0xa758), new Range(0xa75a), new Range(0xa75c), new Range(0xa75e), new Range(0xa760), new Range(0xa762), new Range(0xa764), new Range(0xa766), new Range(0xa768), new Range(0xa76a), new Range(0xa76c), new Range(0xa76e), new Range(0xa779), new Range(0xa77b), new Range(0xa77d, 0xa77e), new Range(0xa780), new Range(0xa782), new Range(0xa784), new Range(0xa786), new Range(0xa78b), new Range(0xa78d), new Range(0xa790), new Range(0xa792), new Range(0xa796), new Range(0xa798), new Range(0xa79a), new Range(0xa79c), new Range(0xa79e), new Range(0xa7a0), new Range(0xa7a2), new Range(0xa7a4), new Range(0xa7a6), new Range(0xa7a8), new Range(0xa7aa, 0xa7ae), new Range(0xa7b0, 0xa7b4), new Range(0xa7b6), new Range(0xa7b8), new Range(0xa7ba), new Range(0xa7bc), new Range(0xa7be), new Range(0xa7c2), new Range(0xa7c4, 0xa7c7), new Range(0xa7c9), new Range(0xa7f5), new Range(0xff21, 0xff3a), new Range(0x10400, 0x10427), new Range(0x104b0, 0x104d3), new Range(0x10c80, 0x10cb2), new Range(0x118a0, 0x118bf), new Range(0x16e40, 0x16e5f), new Range(0x1d400, 0x1d419), new Range(0x1d434, 0x1d44d), new Range(0x1d468, 0x1d481), new Range(0x1d49c), new Range(0x1d49e, 0x1d49f), new Range(0x1d4a2), new Range(0x1d4a5, 0x1d4a6), new Range(0x1d4a9, 0x1d4ac), new Range(0x1d4ae, 0x1d4b5), new Range(0x1d4d0, 0x1d4e9), new Range(0x1d504, 0x1d505), new Range(0x1d507, 0x1d50a), new Range(0x1d50d, 0x1d514), new Range(0x1d516, 0x1d51c), new Range(0x1d538, 0x1d539), new Range(0x1d53b, 0x1d53e), new Range(0x1d540, 0x1d544), new Range(0x1d546), new Range(0x1d54a, 0x1d550), new Range(0x1d56c, 0x1d585), new Range(0x1d5a0, 0x1d5b9), new Range(0x1d5d4, 0x1d5ed), new Range(0x1d608, 0x1d621), new Range(0x1d63c, 0x1d655), new Range(0x1d670, 0x1d689), new Range(0x1d6a8, 0x1d6c0), new Range(0x1d6e2, 0x1d6fa), new Range(0x1d71c, 0x1d734), new Range(0x1d756, 0x1d76e), new Range(0x1d790, 0x1d7a8), new Range(0x1d7ca), new Range(0x1e900, 0x1e921), new Range(0x61, 0x7a), new Range(0xb5), new Range(0xdf, 0xf6), new Range(0xf8, 0xff), new Range(0x101), new Range(0x103), new Range(0x105), new Range(0x107), new Range(0x109), new Range(0x10b), new Range(0x10d), new Range(0x10f), new Range(0x111), new Range(0x113), new Range(0x115), new Range(0x117), new Range(0x119), new Range(0x11b), new Range(0x11d), new Range(0x11f), new Range(0x121), new Range(0x123), new Range(0x125), new Range(0x127), new Range(0x129), new Range(0x12b), new Range(0x12d), new Range(0x12f), new Range(0x131), new Range(0x133), new Range(0x135), new Range(0x137, 0x138), new Range(0x13a), new Range(0x13c), new Range(0x13e), new Range(0x140), new Range(0x142), new Range(0x144), new Range(0x146), new Range(0x148, 0x149), new Range(0x14b), new Range(0x14d), new Range(0x14f), new Range(0x151), new Range(0x153), new Range(0x155), new Range(0x157), new Range(0x159), new Range(0x15b), new Range(0x15d), new Range(0x15f), new Range(0x161), new Range(0x163), new Range(0x165), new Range(0x167), new Range(0x169), new Range(0x16b), new Range(0x16d), new Range(0x16f), new Range(0x171), new Range(0x173), new Range(0x175), new Range(0x177), new Range(0x17a), new Range(0x17c), new Range(0x17e, 0x180), new Range(0x183), new Range(0x185), new Range(0x188), new Range(0x18c, 0x18d), new Range(0x192), new Range(0x195), new Range(0x199, 0x19b), new Range(0x19e), new Range(0x1a1), new Range(0x1a3), new Range(0x1a5), new Range(0x1a8), new Range(0x1aa, 0x1ab), new Range(0x1ad), new Range(0x1b0), new Range(0x1b4), new Range(0x1b6), new Range(0x1b9, 0x1ba), new Range(0x1bd, 0x1bf), new Range(0x1c6), new Range(0x1c9), new Range(0x1cc), new Range(0x1ce), new Range(0x1d0), new Range(0x1d2), new Range(0x1d4), new Range(0x1d6), new Range(0x1d8), new Range(0x1da), new Range(0x1dc, 0x1dd), new Range(0x1df), new Range(0x1e1), new Range(0x1e3), new Range(0x1e5), new Range(0x1e7), new Range(0x1e9), new Range(0x1eb), new Range(0x1ed), new Range(0x1ef, 0x1f0), new Range(0x1f3), new Range(0x1f5), new Range(0x1f9), new Range(0x1fb), new Range(0x1fd), new Range(0x1ff), new Range(0x201), new Range(0x203), new Range(0x205), new Range(0x207), new Range(0x209), new Range(0x20b), new Range(0x20d), new Range(0x20f), new Range(0x211), new Range(0x213), new Range(0x215), new Range(0x217), new Range(0x219), new Range(0x21b), new Range(0x21d), new Range(0x21f), new Range(0x221), new Range(0x223), new Range(0x225), new Range(0x227), new Range(0x229), new Range(0x22b), new Range(0x22d), new Range(0x22f), new Range(0x231), new Range(0x233, 0x239), new Range(0x23c), new Range(0x23f, 0x240), new Range(0x242), new Range(0x247), new Range(0x249), new Range(0x24b), new Range(0x24d), new Range(0x24f, 0x293), new Range(0x295, 0x2af), new Range(0x371), new Range(0x373), new Range(0x377), new Range(0x37b, 0x37d), new Range(0x390), new Range(0x3ac, 0x3ce), new Range(0x3d0, 0x3d1), new Range(0x3d5, 0x3d7), new Range(0x3d9), new Range(0x3db), new Range(0x3dd), new Range(0x3df), new Range(0x3e1), new Range(0x3e3), new Range(0x3e5), new Range(0x3e7), new Range(0x3e9), new Range(0x3eb), new Range(0x3ed), new Range(0x3ef, 0x3f3), new Range(0x3f5), new Range(0x3f8), new Range(0x3fb, 0x3fc), new Range(0x430, 0x45f), new Range(0x461), new Range(0x463), new Range(0x465), new Range(0x467), new Range(0x469), new Range(0x46b), new Range(0x46d), new Range(0x46f), new Range(0x471), new Range(0x473), new Range(0x475), new Range(0x477), new Range(0x479), new Range(0x47b), new Range(0x47d), new Range(0x47f), new Range(0x481), new Range(0x48b), new Range(0x48d), new Range(0x48f), new Range(0x491), new Range(0x493), new Range(0x495), new Range(0x497), new Range(0x499), new Range(0x49b), new Range(0x49d), new Range(0x49f), new Range(0x4a1), new Range(0x4a3), new Range(0x4a5), new Range(0x4a7), new Range(0x4a9), new Range(0x4ab), new Range(0x4ad), new Range(0x4af), new Range(0x4b1), new Range(0x4b3), new Range(0x4b5), new Range(0x4b7), new Range(0x4b9), new Range(0x4bb), new Range(0x4bd), new Range(0x4bf), new Range(0x4c2), new Range(0x4c4), new Range(0x4c6), new Range(0x4c8), new Range(0x4ca), new Range(0x4cc), new Range(0x4ce, 0x4cf), new Range(0x4d1), new Range(0x4d3), new Range(0x4d5), new Range(0x4d7), new Range(0x4d9), new Range(0x4db), new Range(0x4dd), new Range(0x4df), new Range(0x4e1), new Range(0x4e3), new Range(0x4e5), new Range(0x4e7), new Range(0x4e9), new Range(0x4eb), new Range(0x4ed), new Range(0x4ef), new Range(0x4f1), new Range(0x4f3), new Range(0x4f5), new Range(0x4f7), new Range(0x4f9), new Range(0x4fb), new Range(0x4fd), new Range(0x4ff), new Range(0x501), new Range(0x503), new Range(0x505), new Range(0x507), new Range(0x509), new Range(0x50b), new Range(0x50d), new Range(0x50f), new Range(0x511), new Range(0x513), new Range(0x515), new Range(0x517), new Range(0x519), new Range(0x51b), new Range(0x51d), new Range(0x51f), new Range(0x521), new Range(0x523), new Range(0x525), new Range(0x527), new Range(0x529), new Range(0x52b), new Range(0x52d), new Range(0x52f), new Range(0x560, 0x588), new Range(0x10d0, 0x10fa), new Range(0x10fd, 0x10ff), new Range(0x13f8, 0x13fd), new Range(0x1c80, 0x1c88), new Range(0x1d00, 0x1d2b), new Range(0x1d6b, 0x1d77), new Range(0x1d79, 0x1d9a), new Range(0x1e01), new Range(0x1e03), new Range(0x1e05), new Range(0x1e07), new Range(0x1e09), new Range(0x1e0b), new Range(0x1e0d), new Range(0x1e0f), new Range(0x1e11), new Range(0x1e13), new Range(0x1e15), new Range(0x1e17), new Range(0x1e19), new Range(0x1e1b), new Range(0x1e1d), new Range(0x1e1f), new Range(0x1e21), new Range(0x1e23), new Range(0x1e25), new Range(0x1e27), new Range(0x1e29), new Range(0x1e2b), new Range(0x1e2d), new Range(0x1e2f), new Range(0x1e31), new Range(0x1e33), new Range(0x1e35), new Range(0x1e37), new Range(0x1e39), new Range(0x1e3b), new Range(0x1e3d), new Range(0x1e3f), new Range(0x1e41), new Range(0x1e43), new Range(0x1e45), new Range(0x1e47), new Range(0x1e49), new Range(0x1e4b), new Range(0x1e4d), new Range(0x1e4f), new Range(0x1e51), new Range(0x1e53), new Range(0x1e55), new Range(0x1e57), new Range(0x1e59), new Range(0x1e5b), new Range(0x1e5d), new Range(0x1e5f), new Range(0x1e61), new Range(0x1e63), new Range(0x1e65), new Range(0x1e67), new Range(0x1e69), new Range(0x1e6b), new Range(0x1e6d), new Range(0x1e6f), new Range(0x1e71), new Range(0x1e73), new Range(0x1e75), new Range(0x1e77), new Range(0x1e79), new Range(0x1e7b), new Range(0x1e7d), new Range(0x1e7f), new Range(0x1e81), new Range(0x1e83), new Range(0x1e85), new Range(0x1e87), new Range(0x1e89), new Range(0x1e8b), new Range(0x1e8d), new Range(0x1e8f), new Range(0x1e91), new Range(0x1e93), new Range(0x1e95, 0x1e9d), new Range(0x1e9f), new Range(0x1ea1), new Range(0x1ea3), new Range(0x1ea5), new Range(0x1ea7), new Range(0x1ea9), new Range(0x1eab), new Range(0x1ead), new Range(0x1eaf), new Range(0x1eb1), new Range(0x1eb3), new Range(0x1eb5), new Range(0x1eb7), new Range(0x1eb9), new Range(0x1ebb), new Range(0x1ebd), new Range(0x1ebf), new Range(0x1ec1), new Range(0x1ec3), new Range(0x1ec5), new Range(0x1ec7), new Range(0x1ec9), new Range(0x1ecb), new Range(0x1ecd), new Range(0x1ecf), new Range(0x1ed1), new Range(0x1ed3), new Range(0x1ed5), new Range(0x1ed7), new Range(0x1ed9), new Range(0x1edb), new Range(0x1edd), new Range(0x1edf), new Range(0x1ee1), new Range(0x1ee3), new Range(0x1ee5), new Range(0x1ee7), new Range(0x1ee9), new Range(0x1eeb), new Range(0x1eed), new Range(0x1eef), new Range(0x1ef1), new Range(0x1ef3), new Range(0x1ef5), new Range(0x1ef7), new Range(0x1ef9), new Range(0x1efb), new Range(0x1efd), new Range(0x1eff, 0x1f07), new Range(0x1f10, 0x1f15), new Range(0x1f20, 0x1f27), new Range(0x1f30, 0x1f37), new Range(0x1f40, 0x1f45), new Range(0x1f50, 0x1f57), new Range(0x1f60, 0x1f67), new Range(0x1f70, 0x1f7d), new Range(0x1f80, 0x1f87), new Range(0x1f90, 0x1f97), new Range(0x1fa0, 0x1fa7), new Range(0x1fb0, 0x1fb4), new Range(0x1fb6, 0x1fb7), new Range(0x1fbe), new Range(0x1fc2, 0x1fc4), new Range(0x1fc6, 0x1fc7), new Range(0x1fd0, 0x1fd3), new Range(0x1fd6, 0x1fd7), new Range(0x1fe0, 0x1fe7), new Range(0x1ff2, 0x1ff4), new Range(0x1ff6, 0x1ff7), new Range(0x210a), new Range(0x210e, 0x210f), new Range(0x2113), new Range(0x212f), new Range(0x2134), new Range(0x2139), new Range(0x213c, 0x213d), new Range(0x2146, 0x2149), new Range(0x214e), new Range(0x2184), new Range(0x2c30, 0x2c5e), new Range(0x2c61), new Range(0x2c65, 0x2c66), new Range(0x2c68), new Range(0x2c6a), new Range(0x2c6c), new Range(0x2c71), new Range(0x2c73, 0x2c74), new Range(0x2c76, 0x2c7b), new Range(0x2c81), new Range(0x2c83), new Range(0x2c85), new Range(0x2c87), new Range(0x2c89), new Range(0x2c8b), new Range(0x2c8d), new Range(0x2c8f), new Range(0x2c91), new Range(0x2c93), new Range(0x2c95), new Range(0x2c97), new Range(0x2c99), new Range(0x2c9b), new Range(0x2c9d), new Range(0x2c9f), new Range(0x2ca1), new Range(0x2ca3), new Range(0x2ca5), new Range(0x2ca7), new Range(0x2ca9), new Range(0x2cab), new Range(0x2cad), new Range(0x2caf), new Range(0x2cb1), new Range(0x2cb3), new Range(0x2cb5), new Range(0x2cb7), new Range(0x2cb9), new Range(0x2cbb), new Range(0x2cbd), new Range(0x2cbf), new Range(0x2cc1), new Range(0x2cc3), new Range(0x2cc5), new Range(0x2cc7), new Range(0x2cc9), new Range(0x2ccb), new Range(0x2ccd), new Range(0x2ccf), new Range(0x2cd1), new Range(0x2cd3), new Range(0x2cd5), new Range(0x2cd7), new Range(0x2cd9), new Range(0x2cdb), new Range(0x2cdd), new Range(0x2cdf), new Range(0x2ce1), new Range(0x2ce3, 0x2ce4), new Range(0x2cec), new Range(0x2cee), new Range(0x2cf3), new Range(0x2d00, 0x2d25), new Range(0x2d27), new Range(0x2d2d), new Range(0xa641), new Range(0xa643), new Range(0xa645), new Range(0xa647), new Range(0xa649), new Range(0xa64b), new Range(0xa64d), new Range(0xa64f), new Range(0xa651), new Range(0xa653), new Range(0xa655), new Range(0xa657), new Range(0xa659), new Range(0xa65b), new Range(0xa65d), new Range(0xa65f), new Range(0xa661), new Range(0xa663), new Range(0xa665), new Range(0xa667), new Range(0xa669), new Range(0xa66b), new Range(0xa66d), new Range(0xa681), new Range(0xa683), new Range(0xa685), new Range(0xa687), new Range(0xa689), new Range(0xa68b), new Range(0xa68d), new Range(0xa68f), new Range(0xa691), new Range(0xa693), new Range(0xa695), new Range(0xa697), new Range(0xa699), new Range(0xa69b), new Range(0xa723), new Range(0xa725), new Range(0xa727), new Range(0xa729), new Range(0xa72b), new Range(0xa72d), new Range(0xa72f, 0xa731), new Range(0xa733), new Range(0xa735), new Range(0xa737), new Range(0xa739), new Range(0xa73b), new Range(0xa73d), new Range(0xa73f), new Range(0xa741), new Range(0xa743), new Range(0xa745), new Range(0xa747), new Range(0xa749), new Range(0xa74b), new Range(0xa74d), new Range(0xa74f), new Range(0xa751), new Range(0xa753), new Range(0xa755), new Range(0xa757), new Range(0xa759), new Range(0xa75b), new Range(0xa75d), new Range(0xa75f), new Range(0xa761), new Range(0xa763), new Range(0xa765), new Range(0xa767), new Range(0xa769), new Range(0xa76b), new Range(0xa76d), new Range(0xa76f), new Range(0xa771, 0xa778), new Range(0xa77a), new Range(0xa77c), new Range(0xa77f), new Range(0xa781), new Range(0xa783), new Range(0xa785), new Range(0xa787), new Range(0xa78c), new Range(0xa78e), new Range(0xa791), new Range(0xa793, 0xa795), new Range(0xa797), new Range(0xa799), new Range(0xa79b), new Range(0xa79d), new Range(0xa79f), new Range(0xa7a1), new Range(0xa7a3), new Range(0xa7a5), new Range(0xa7a7), new Range(0xa7a9), new Range(0xa7af), new Range(0xa7b5), new Range(0xa7b7), new Range(0xa7b9), new Range(0xa7bb), new Range(0xa7bd), new Range(0xa7bf), new Range(0xa7c3), new Range(0xa7c8), new Range(0xa7ca), new Range(0xa7f6), new Range(0xa7fa), new Range(0xab30, 0xab5a), new Range(0xab60, 0xab68), new Range(0xab70, 0xabbf), new Range(0xfb00, 0xfb06), new Range(0xfb13, 0xfb17), new Range(0xff41, 0xff5a), new Range(0x10428, 0x1044f), new Range(0x104d8, 0x104fb), new Range(0x10cc0, 0x10cf2), new Range(0x118c0, 0x118df), new Range(0x16e60, 0x16e7f), new Range(0x1d41a, 0x1d433), new Range(0x1d44e, 0x1d454), new Range(0x1d456, 0x1d467), new Range(0x1d482, 0x1d49b), new Range(0x1d4b6, 0x1d4b9), new Range(0x1d4bb), new Range(0x1d4bd, 0x1d4c3), new Range(0x1d4c5, 0x1d4cf), new Range(0x1d4ea, 0x1d503), new Range(0x1d51e, 0x1d537), new Range(0x1d552, 0x1d56b), new Range(0x1d586, 0x1d59f), new Range(0x1d5ba, 0x1d5d3), new Range(0x1d5ee, 0x1d607), new Range(0x1d622, 0x1d63b), new Range(0x1d656, 0x1d66f), new Range(0x1d68a, 0x1d6a5), new Range(0x1d6c2, 0x1d6da), new Range(0x1d6dc, 0x1d6e1), new Range(0x1d6fc, 0x1d714), new Range(0x1d716, 0x1d71b), new Range(0x1d736, 0x1d74e), new Range(0x1d750, 0x1d755), new Range(0x1d770, 0x1d788), new Range(0x1d78a, 0x1d78f), new Range(0x1d7aa, 0x1d7c2), new Range(0x1d7c4, 0x1d7c9), new Range(0x1d7cb), new Range(0x1e922, 0x1e943), new Range(0x1c5), new Range(0x1c8), new Range(0x1cb), new Range(0x1f2), new Range(0x1f88, 0x1f8f), new Range(0x1f98, 0x1f9f), new Range(0x1fa8, 0x1faf), new Range(0x1fbc), new Range(0x1fcc), new Range(0x1ffc));
